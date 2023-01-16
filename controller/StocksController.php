<?php

class StocksController
{
    public function __construct(){}

    public function displayStocks($listProduitsCritique,int $verifErreur)
    {
        $array = $this->verifErreur($verifErreur);
        $vue = new Vue('Stocks');
        $vue -> display(['produitsCritique' => $listProduitsCritique,
                         'verifErreur' => $array]);
    }

    private  function verifErreur(int $verifErreur)
    {
        switch($verifErreur)
        {
            case 0:
                $array[0] = "";
                $array[1] = "";
                return $array;
            case 1:
                $array[0] = "Produit introuvable";
                $array[1] = "";
                return $array;
            case 2:
                $array[0] = "";
                $array[1] = "Produit introuvable";
                return $array;
        }
    }
}

?>