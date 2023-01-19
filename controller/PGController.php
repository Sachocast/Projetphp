<?php

class PGController 
{
    public function __construct(){}

    public function displayPG($_array)
    {
        $array = $_array;
        $vue = new Vue('PageGenre');
        $vue->display(['listProduit' => $array]);
    }
}

?>