<?php

class LoginController 
{
    public function __construct(){}

    public function displayLogin()
    {
        $array = [];
        $vue = new Vue('login');
        $vue -> display($array);
    }
}

?>