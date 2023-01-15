<?php

class AdminController 
{
    public function __construct(){}

    public function displayAdmin(int $i)
    {
        $array = $this->verif($i);
        $vue = new Vue('Admin');
        $vue->display(['admin' => $array]);
    }

    private  function verif(int $verifErreur)
    {
        switch($verifErreur)
        {
            case 0:
                $array[0] = "";
                $array[1] = "";
                $array[2] = "";
                return $array;
            case 1:
                $array[0] = "Le produit existe deja";
                $array[1] = "";
                $array[2] = "";
                return $array;
            case 2:
                $array[0] = "";
                $array[1] = "Produit introuvable";
                $array[2] = "";
                return $array;
            case 3:
                $array[0] = "";
                $array[1] = "";
                $array[2] = "Produit introuvable";
                return $array;
        }
    }
}

?>