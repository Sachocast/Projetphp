<?php

class ComptaController
{
    public function __construct(){}

    public function displayCompta($comptaAnnee,$credit,$debit)
    {
        $array = $comptaAnnee; $array2 = $credit; $array3 = $debit;
        $vue = new Vue('Compta');
        $vue -> display(['comptaAnnee' => $array,
        'credit' => $array2,
        'debit' => $array3]);
    }

}

?>