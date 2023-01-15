<?php
require_once __DIR__ . '/../model/GestionFournisseur.php';

class GestionStock
{
    private $db;
    private $gestionFournisseur;

    public function __construct(PDO $bdd)
    {
        $this->db = $bdd;
        $this->gestionFournisseur = new GestionFournisseur($bdd);
    }

    public function insert($idProduit,$qteStock,$nomF,$emailF)
    {
        if($this->verifExistePas($idProduit))
        {
            $qteStock = intval($qteStock);
            $idFournisseur = $this->chercheIdFournisseur($nomF,$emailF);
            $query = "insert into gestion_stock (idProduit,idFournisseur,qteStock) 
            values ('$idProduit', '$idFournisseur','$qteStock')";
            $stmt = $this->db->prepare($query);
    
            $stmt->execute();
        }        
    }

    private function verifExistePas($idProduit)
    {
        $results = $this->recherche($idProduit);

        if (empty($results)) {
            return true;
        } 
        return false;
    }

    public function recherche($idProduit)
    {
        $query = "SELECT * FROM gestion_stock WHERE idProduit = '$idProduit'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        $results = $stmt->fetchAll();

        return $results;
    }

    private function chercheIdFournisseur($nomF,$emailF)
    {
        $fournisseur = $this->gestionFournisseur->recherche($nomF,$emailF);
        foreach($fournisseur as $row) {return $row['idFournisseur'];}
    }

    public function supprimer($idProduit): bool
    {
        if(!$this->verifExistePas($idProduit))
        {
            $query = "DELETE FROM gestion_stock WHERE idProduit = '$idProduit'";
            $stmt = $this->db->prepare($query);
    
            $stmt->execute();
            return true;
        }
        return false;
    }
}

?>