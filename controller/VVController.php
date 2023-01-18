<?php

class VVController
{
    public function __construct(){}

    public function displayVV($facture,$listeP,$infoProduit)
    {
        $array = $facture; $array2 = $listeP; $array3 = $infoProduit;
        $vue = new Vue('ValideVente');
        $vue -> display(['facture' => $array,
        'listeProduit' => $array2,
        'infoProduit' => $array3]);
    }

}

?>