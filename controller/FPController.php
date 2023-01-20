<?php

class FPController 
{
    public function __construct(){}

    public function displayFP()
    {
        $array = [];
        $vue = new Vue('FinPaiement');
        $vue->display($array);
    }
}

?>