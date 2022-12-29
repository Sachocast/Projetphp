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

    public function handleRequest(String $val){
        if($val == 'accueil')
        {
            $this->accueilController->displayAccueil();
            return;
        }  
        else if($val == 'login')
        {
            $this->loginController->displayLogin();
            return;
        }
    }


}

?>