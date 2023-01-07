<?php

class LoginController 
{
    public function __construct(){}

    public function displayLogin(int $verifErreur)
    {
        $array = $this->verifErreurCreationCompte($verifErreur);
        $vue = new Vue('login');
        $vue -> display(['login' => $array]);
    }

    private  function verifErreurCreationCompte(int $verifErreur)
    {
        switch($verifErreur)
        {
            case 0:
                $array[0] = "";
                $array[1] = "";
                return $array;
            case 1:
                $array[0] = "Email deja utilisé";
                $array[1] = "";
                return $array;
            case 2:
                $array[0] = "";
                $array[1] = "Numero deja utilisé";
                return $array;
        }
    }
}

?>