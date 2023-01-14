<?php
require_once __DIR__ . '/../model/GestionFournisseur.php';

class GestionProduit
{

    private $db;
    private $gestionFournisseur;

    public function __construct(PDO $bdd)
    {
        $this->db = $bdd;
        $this->gestionFournisseur = new GestionFournisseur($bdd);
    }

    public function insert($titre,$genre,$anneeSortie,$prixPublic,$PrixAchat,$cover,$descriptif,$artiste,$nomF,$emailF): bool
    {
        if($this->verifExistePas($titre,$genre,$anneeSortie,$cover,$artiste))
        {
            $query = "insert into produit (titre, genre, anneeSortie, prixPublic, prixAchat, cover, descriptif, artiste) 
            values ('$titre', '$genre', '$anneeSortie', '$prixPublic','$PrixAchat','$cover','$descriptif','$artiste')";
            $stmt = $this->db->prepare($query);
    
            $stmt->execute();
            $this->gestionFournisseur->insert($nomF,$emailF);
            return true;
        }
        return false;
        
    }

    public function verifExistePas($titre,$genre,$anneeSortie,$cover,$artiste) : bool
    {
        $results = $this->recherche($titre,$genre,$anneeSortie,$cover,$artiste);
        if (empty($results)) {
            return true;
        } 
        return false;
        
    }

    public function recherche($titre,$genre,$anneeSortie,$cover,$artiste)
    {
        $query = "SELECT * FROM produit WHERE titre = '$titre' AND genre = '$genre' AND anneeSortie = '$anneeSortie'
        AND cover = '$cover' AND artiste = '$artiste'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        $results = $stmt->fetchAll();

        return $results;
    }
}

?>