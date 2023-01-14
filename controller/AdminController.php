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
                return $array;
            case 1:
                $array[0] = "Le produit existe deja";
                return $array;
        }
    }
}

?>