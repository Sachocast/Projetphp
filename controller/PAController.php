<?php

class PAController 
{
    public function __construct(){}

    public function displayPA($_array)
    {
        $array = $_array;
        $vue = new Vue('PageArtiste');
        $vue->display(['listProduit' => $array]);
    }
}

?>