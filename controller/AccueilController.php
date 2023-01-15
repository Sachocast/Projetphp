<?php

class AccueilController 
{
    public function __construct(){}

    public function displayAccueil($_array)
    {
        $array = $_array;
        $vue = new Vue('Accueil');
        $vue->display(['listProduit' => $array]);
    }
}

?>