<?php

class AdminController 
{
    public function __construct(){}

    public function displayAdmin()
    {
        $array = [];
        $vue = new Vue('Admin');
        $vue->display($array);
    }
}

?>