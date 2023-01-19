<?php

use function PHPSTORM_META\type;

require_once __DIR__ . '/../model/ConnexionDB.php';
require_once __DIR__ . '/../model/GestionClient.php';
require_once __DIR__ . '/../model/GestionProduit.php';
require_once __DIR__ . '/../model/GestionStock.php';
require_once __DIR__ . '/../model/GestionPanier.php';
require_once __DIR__ . '/../model/GestionCompta.php';
require_once __DIR__ . '/AccueilController.php';
require_once __DIR__ . '/LoginController.php';
require_once __DIR__ . '/PanierController.php';
require_once __DIR__ . '/AdminController.php';
require_once __DIR__ . '/APController.php';
require_once __DIR__ . '/StocksController.php';
require_once __DIR__ . '/VVController.php';
require_once __DIR__ . '/PAController.php';
require_once __DIR__ . '/PGController.php';
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
    private $vvController;
    private $paController;
    private $pgController;
    private $gestionClient;
    private $gestionProduit;
    private $gestionStock;
    private $gestionPanier;
    private $gestionCompta;
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
        $this->vvController = new VVController();
        $this->paController = new paController();
        $this->pgController = new pgController();
        $this->gestionStock = new GestionStock($this->db);
        $this->gestionClient = new GestionClient($this->db);
        $this->gestionProduit = new GestionProduit($this->db,$this->gestionStock);
        $this->gestionPanier = new GestionPanier($this->db);
        $this->gestionCompta = new GestionCompta($this->db);
        $this->listProduit = $this->gestionProduit->chercheToutLesProduits();
        $this->connection();
        if(isset($_POST['action'])){
            if(($_POST['action']!='validerPanier') && ($_POST['action']!='paiement')){
                $this->gestionPanier->deleteFacture();}
        }
    }

    public function handleRequest(){
        $this->avertissementStock();   
        if(!isset($_POST['action']) || $_POST['action'] == 'accueil')
        {
            $this->accueilController->displayAccueil($this->listProduit);
            return;
        }
        if($_POST['action'] == 'pageArtiste')
        {
            $this->paController->displayPA(($this->gestionProduit->chercheToutLesProduitsArtiste($_POST['artiste'])));
            return;
        }
        if($_POST['action'] == 'pageGenre')
        {
            $this->pgController->displayPG(($this->gestionProduit->chercheToutLesProduitsGenre($_POST['genre'])));
            return;
        }
        if($_POST['action'] == 'login')
        {
            $this->loginController->displayLogin(0);
            return;
        } 
        if($_POST['action'] == 'panier')
        {   
            $this->gestionPanier->createFacture();
            $this->panierController->displayPanier($this->gestionPanier->chercheLesProduitsDuPanier());
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
                    $produit = $this->gestionProduit->rechercheAvecId($_POST['idProduit'],$_POST['titreAlbum']);
                    $this->gestionStock->updateQteStock($_POST['idProduit'],$_POST['qte']);
                    $this->gestionCompta->insertListeAchat($produit[0]['idProduit'],$_POST['qte'],$produit[0]['prixAchat']);
                    $this->gestionCompta->metAjourDebit($produit[0]['prixAchat'],$_POST['qte']);
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
        if($_POST['action'] == 'ajouterPanier')
        {
            try {
                $this->gestionPanier->createSessionPanier($this->gestionProduit->rechercheAvecId($_POST['idProduit'],$_POST['titreAlbum']));
                $this->accueilController->displayAccueil($this->listProduit);

                return;
            }catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        if($_POST['action'] == 'viderPanier')
        {
            $this->gestionPanier->viderPanier();
            $this->panierController->displayPanier($this->gestionPanier->chercheLesProduitsDuPanier());
            return;
        }
        if($_POST['action'] == 'validerPanier')
        {
            $this->vvController->displayVV($this->gestionPanier->selectFacture(),$this->gestionPanier->selectListeProduit(),$this->gestionPanier->selectInfo());
            return;
        } 
        if($_POST['action'] == 'paiement')
        {
            $this->gestionPanier->finPaiement();
            $this->gestionCompta->metAjourCA();
            $this->gestionStock->metAjourStock();     
            $_POST['action'] = 'viderPanier';
            $this->handleRequest();
            return;
        }      

    }

    private function avertissementStock()
    {
        if(isset($_SESSION['admin'])){
            if($_SESSION['admin']==true && $this->gestionStock->verifStocks()==true){
                $_SESSION['avertissementStock']=true;
            }
            else{$_SESSION['avertissementStock']=false;}
        }
    }

    private function connection()
    {
        if(isset($_COOKIE['email'])){
            $_SESSION['email']=$_COOKIE['email'];
            $_SESSION['nomUtil']=$_COOKIE['nomUtil'];
            $_SESSION['mdp']=$_COOKIE['mdp'];
            $_SESSION['pays']=$_COOKIE['pays'];
            $_SESSION['ville']=$_COOKIE['ville'];
            $_SESSION['admin']=$_COOKIE['admin'];
            $_SESSION['numTel']=$_COOKIE['numTel'];
        }
    }

}

$router = new Routeur();
$router->handleRequest();


?>