<?php

class LoginController 
{
    public function __construct(){}

    public function displayLogin(int $verifErreur)
    {
        if($verifErreur <3 ){$array = $this->verifErreurCreationCompte($verifErreur);}
        else{$array = $this->verifErreurLogin($verifErreur);}
        $vue = new Vue('Login');
        $vue -> display(['login' => $array]);
    }

    private  function verifErreurCreationCompte(int $verifErreur)
    {
        switch($verifErreur)
        {
            case 0:
                $array[0] = "";
                $array[1] = "";
                $array[2] = "";
                $array[3] = "";
                return $array;
            case 1:
                $array[0] = "Email deja utilisé";
                $array[1] = "";
                $array[2] = "";
                $array[3] = "";
                return $array;
            case 2:
                $array[0] = "";
                $array[1] = "Numero deja utilisé";
                $array[2] = "";
                $array[3] = "";
                return $array;
        }
    }

    private  function verifErreurLogin(int $verifErreur)
    {
        switch($verifErreur)
        {
            case 3:
                $array[0] = "";
                $array[1] = "";
                $array[2] = "Email incorrecte";
                $array[3] = "";
                return $array;
            case 4:
                $array[0] = "";
                $array[1] = "";
                $array[2] = "";
                $array[3] = "Mot de passe incorrecte";
                return $array;
        }
    }
}

?>