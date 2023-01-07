<?php

class GestionClient
{

    private $db;

    public function __construct(PDO $bdd)
    {
        $this->db = $bdd;
    }

    public function insert($email,$nomUtil,$mdp,$numTel,$pays,$ville)
    {
        $query = "insert into client (email, nomUtilisateur, mdp, numTel, pays, ville, admin) 
        values ('$email', '$nomUtil', '$mdp', '$numTel','$pays','$ville','0')";
        $stmt = $this->db->prepare($query);

        $stmt->execute();
    }


}

?>