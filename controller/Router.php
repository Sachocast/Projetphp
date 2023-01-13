<?php

require_once __DIR__ . '/../model/ConnexionDB.php';
require_once __DIR__ . '/../model/GestionClient.php';
require_once __DIR__ . '/AccueilController.php';
require_once __DIR__ . '/LoginController.php';
require_once __DIR__ . '/PanierController.php';
require_once __DIR__ . '/AdminController.php';
require_once __DIR__ . '/../view/Vue.php';

class Router
{
    private $db;
    private $accueilController;
    private $loginController;
    private $panierController;
    private $adminController;
    private $GestionClient;

    public function __construct()
    {
        $connect =  new ConnexionDB();
        $this->db = $connect->getDB();
        $this->accueilController = new AccueilController();
        $this->loginController = new LoginController();
        $this->panierController = new PanierController();
        $this->adminController = new AdminController();
        $this->GestionClient = new GestionClient($this->db);
    }

    public function handleRequest(){
        if(!isset($_POST['page']) || $_POST['page'] == 'accueil')
        {
            $this->accueilController->displayAccueil();
            return;
        }
        if($_POST['page'] == 'login')
        {
            $this->loginController->displayLogin(0);
            return;
        } 
        if($_POST['page'] == 'panier')
        {
            $this->panierController->displayPanier();
            return;
        }    
        if($_POST['page'] == 'admin')
        {
            $this->adminController->displayAdmin();
            return;
        }      
        if($_POST['page'] == 'ajoutClient')
        {
            try {
                // Requête SQL ici
                $this->GestionClient->insert($_POST['email'],$_POST['nomUtil'],$_POST['mdp'],$_POST['numTel'],$_POST['pays'],$_POST['ville']);
                $this->accueilController->displayAccueil();
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
        if($_POST['page'] == 'connexion')
        {
            try {
                // Requête SQL ici
                if($this->GestionClient->verifEmail($_POST['email'],$_POST['mdp']) != 0)
                {
                    $this->loginController->displayLogin($this->GestionClient->verifEmail($_POST['email'],$_POST['mdp']));
                }
                else 
                {
                    $this->GestionClient->connection($_POST['email'],$_POST['mdp']);
                    $this->accueilController->displayAccueil();
                }
                return;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
              return;
        }
        if($_POST['page'] == 'logout')
        {
            $this->GestionClient->deconnection();
            $this->accueilController->displayAccueil();

        }

    }




}

$router = new Router();
$router->handleRequest();


?>