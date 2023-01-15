<?php

class APController
{
    public function __construct(){}

    public function displayAP($_array)
    {
        $array = $_array;
        $vue = new Vue('AffichageProduit');
        $vue->display(['ap' => $array]);
    }


}

?>