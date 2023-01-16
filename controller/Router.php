<?php

require_once __DIR__ . '/../model/ConnexionDB.php';
require_once __DIR__ . '/../model/GestionClient.php';
require_once __DIR__ . '/../model/GestionProduit.php';
require_once __DIR__ . '/../model/GestionStock.php';
require_once __DIR__ . '/AccueilController.php';
require_once __DIR__ . '/LoginController.php';
require_once __DIR__ . '/PanierController.php';
require_once __DIR__ . '/AdminController.php';
require_once __DIR__ . '/APController.php';
require_once __DIR__ . '/StocksController.php';
require_once __DIR__ . '/../view/Vue.php';

class Routeur
{
    private $db;
    private $accueilController;
    private $loginController;
    private $panierController;
    private $adminController;
    private $apController;
    private $stocksController;
    private $gestionClient;
    private $gestionProduit;
    private $gestionStock;
    private $listProduit;

    public function __construct()
    {
        $connect =  new ConnexionDB();
        $this->db = $connect->getDB();
        $this->accueilController = new AccueilController();
        $this->loginController = new LoginController();
        $this->panierController = new PanierController();
        $this->adminController = new AdminController();
        $this->apController = new APController();
        $this->stocksController = new StocksController();
        $this->gestionStock = new GestionStock($this->db);
        $this->gestionClient = new GestionClient($this->db);
        $this->gestionProduit = new GestionProduit($this->db,$this->gestionStock);
        $this->listProduit = $this->gestionProduit->chercheToutLesProduits();

    }

    public function handleRequest(){
        $this->avertissementStock();        
        if(!isset($_POST['action']) || $_POST['action'] == 'accueil')
        {
            $this->accueilController->displayAccueil($this->listProduit);
            return;
        }
        if($_POST['action'] == 'login')
        {
            $this->loginController->displayLogin(0);
            return;
        } 
        if($_POST['action'] == 'panier')
        {
            $this->panierController->displayPanier();
            return;
        }    
        if($_POST['action'] == 'admin')
        {
            $this->adminController->displayAdmin(0);
            return;
        }
        if($_POST['action'] == 'stocks')
        {
            $this->stocksController->displayStocks($this->gestionProduit->selectInfoProduitStockCritique(),0);
            return;
        }          
        if($_POST['action'] == 'ajoutClient')
        {
            try {
                // Requête SQL ici
                $this->gestionClient->insert($_POST['email'],$_POST['nomUtil'],$_POST['mdp'],$_POST['numTel'],$_POST['pays'],$_POST['ville']);
                $this->accueilController->displayAccueil($this->listProduit);
                return;
              } catch (PDOException $e) {
                if ($e->getMessage()=="SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '".$_POST['email']."' for key 'PRIMARY'") {
                    // Erreur de duplication de clé primaire
                    $this->loginController->displayLogin(1);
                }
                else if ($e->getMessage()=="SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '".$_POST['numTel']."' for key 'numTel'") {
                    // Erreur de duplication du numéro
                    $this->loginController->displayLogin(2);
                }
                else{
                 echo $e->getMessage();
                }
            }
              return;

        }
        if($_POST['action'] == 'connexion')
        {
            try {
                // Requête SQL ici
                if($this->gestionClient->verifEmail($_POST['email'],$_POST['mdp']) != 0)
                {
                    $this->loginController->displayLogin($this->gestionClient->verifEmail($_POST['email'],$_POST['mdp']));
                }
                else 
                {
                    $this->gestionClient->connection($_POST['email'],$_POST['mdp']);
                    $this->avertissementStock();        
                    $this->accueilController->displayAccueil($this->listProduit);
                }
                return;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
              return;
        }
        if($_POST['action'] == 'logout')
        {
            $this->gestionClient->deconnection();
            $this->accueilController->displayAccueil($this->listProduit);
            return;
        }
        if($_POST['action'] == 'ajoutProduit')
        {
            try {
                if($this->gestionProduit->insert($_POST['titreAlbum'],$_POST['genre'],$_POST['anneeSortie'],$_POST['prixPublic'],$_POST['prixAchat'],
                $_POST['cover'],$_POST['descriptif'],$_POST['artiste'],$_POST['nomF'],$_POST['emailF']))
                {
                    $produit = $this->gestionProduit->recherche($_POST['titreAlbum'],$_POST['genre'],$_POST['anneeSortie'],$_POST['cover'],$_POST['artiste']);
                    $idProduit ="";
                    foreach($produit as $row){$idProduit= $row['idProduit'];}
                    $this->gestionStock->insert($idProduit,$_POST['qteStock'],$_POST['nomF'],$_POST['emailF']);
                    $this->adminController->displayAdmin(0);

                }
                else $this->adminController->displayAdmin(1);
                return;
            }catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        if($_POST['action'] == 'rechercheProduit')
        {
            try {
                
                $result = $this->gestionProduit->recherche($_POST['titreAlbum'],$_POST['genre'],$_POST['anneeSortie'],"",$_POST['artiste']);
                if(empty($result)) {
                    $this->adminController->displayAdmin(2);  
                } 
                else { 
                    $this->apController->displayAP($result);
                    return;
                }
            }catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        if($_POST['action'] == 'supprimerProduit')
        {
            try {
                if($this->gestionProduit->supprimer($_POST['idProduit'],$_POST['titreAlbum'],$_POST['artiste'],$_POST['genre'],$_POST['anneeSortie'])){
                    $this->adminController->displayAdmin(0);
                }
                else {$this->adminController->displayAdmin(3);}
                return;
            }catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        if($_POST['action'] == 'passerCommande')
        {
            try {
                if($this->gestionProduit->verifProduit($_POST['idProduit'],$_POST['titreAlbum'])){
                    $this->gestionStock->updateQteStock($_POST['idProduit'],$_POST['qte']);
                    $this->stocksController->displayStocks($this->gestionProduit->selectInfoProduitStockCritique(),0);
                }
                else{ $this->stocksController->displayStocks($this->gestionProduit->selectInfoProduitStockCritique(),1);}
                return;
            }catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        if($_POST['action'] == 'updateFournisseur')
        {
            try {
                if($this->gestionProduit->verifProduit($_POST['idProduit'],$_POST['titreAlbum'])){
                    $this->gestionStock->updateFournisseur($_POST['idProduit'],$_POST['nomF'],$_POST['emailF']);
                    $this->stocksController->displayStocks($this->gestionProduit->selectInfoProduitStockCritique(),0);
                }
                else{ $this->stocksController->displayStocks($this->gestionProduit->selectInfoProduitStockCritique(),2);}
                return;
            }catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

    }

    private function avertissementStock()
    {
        if($_SESSION['admin']==true && $this->gestionStock->verifStocks()==true){
            $_SESSION['avertissementStock']=true;
        }
        else{$_SESSION['avertissementStock']=false;}
    }

}

$router = new Routeur();
$router->handleRequest();


?>