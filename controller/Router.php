<?php

require_once __DIR__ . '/../model/ConnexionDB.php';
require_once __DIR__ . '/AccueilController.php';
require_once __DIR__ . '/LoginController.php';
require_once __DIR__ . '/../view/Vue.php';

class Router
{
    private $db;
    private $accueilController;
    private $loginController;

    public function __construct()
    {
        $this->db = new ConnexionDB();
        $this->accueilController = new AccueilController();
        $this->loginController = new LoginController();
    }

    public function handleRequest(){
        if(!isset($_POST['action']) || $_POST['action'] == 'accueil')
        {
            $this->accueilController->displayAccueil();
            return;
        }
        if($_POST['action'] == 'login')
        {
            $this->loginController->displayLogin();
            return;
        }    

    }


}

$router = new Router();
$router->handleRequest();


?>