<?php

class GestionProduit
{

    private $db;

    public function __construct(PDO $bdd)
    {
        $this->db = $bdd;
    }

    public function insert($titre,$genre,$anneeSortie,$prixPublic,$PrixAchat,$cover,$descriptif,$artiste)
    {
        $query = "insert into produit (titre, genre, anneeSortie, prixPublic, prixAchat, cover, descriptif, artiste) 
        values ('$titre', '$genre', '$anneeSortie', '$prixPublic','$PrixAchat','$cover','$descriptif','$artiste')";
        $stmt = $this->db->prepare($query);

        $stmt->execute();
    }

}

?>