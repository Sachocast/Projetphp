<?php

class VVController
{
    public function __construct(){}

    public function displayVV($facture,$listeP)
    {
        $array = $facture; $array2 = $listeP;
        $vue = new Vue('ValideVente');
        $vue -> display(['facture' => $array,
        'listeProduit' => $array2]);
    }

}

?>