<?php

class PanierController 
{
    public function __construct(){}

    public function displayPanier()
    {
        $array = [];
        $vue = new Vue('Panier');
        $vue->display($array);
    }
}

?>