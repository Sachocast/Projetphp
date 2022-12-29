<?php

class AccueilController 
{
    public function __construct(){}

    public function displayAccueil()
    {
        $array = [];
        $vue = new Vue('accueil');
        $vue -> display($array);
    }
}

?>