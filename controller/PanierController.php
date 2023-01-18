<?php

class PanierController 
{
    public function __construct(){}

    public function displayPanier($_array)
    {
        $array = $_array;
        $vue = new Vue('Panier');
        $vue->display(['panier' => $array]);
    }
}

?>