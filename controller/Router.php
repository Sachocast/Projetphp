<?php

require_once __DIR__ . '/../model/ConnexionDB.php';
require_once __DIR__ . '/../model/GestionClient.php';
require_once __DIR__ . '/AccueilController.php';
require_once __DIR__ . '/LoginController.php';
require_once __DIR__ . '/../view/Vue.php';
require_once __DIR__ . '/../view/Vue.php';

class Router
{
    private $db;
    private $accueilController;
    private $loginController;
    private $GestionClient;

    public function __construct()
    {
        $connect =  new ConnexionDB();
        $this->db = $connect->getDB();
        $this->accueilController = new AccueilController();
        $this->loginController = new LoginController();
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
            $this->loginController->displayLogin();
            return;
        }    
        if($_POST['page'] == 'ajoutClient')
        {
            $this->GestionClient->insert($_POST['email'],$_POST['nomUtil'],$_POST['mdp'],$_POST['numTel'],$_POST['pays'],$_POST['ville'],$_POST['admin']);
            $this->accueilController->displayAccueil();
            return;

        }

    }




}

$router = new Router();
$router->handleRequest();


?>