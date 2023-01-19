<?php
require_once __DIR__ . '/../model/GestionFournisseur.php';

class GestionProduit
{

    private $db;
    private $gestionFournisseur;
    private $gestionStock;

    public function __construct(PDO $bdd, GestionStock $gs)
    {
        $this->db = $bdd;
        $this->gestionFournisseur = new GestionFournisseur($bdd);
        $this->gestionStock = $gs;
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
        if($cover!=""){
            $query = "SELECT * FROM produit WHERE titre = '$titre' AND genre = '$genre' AND anneeSortie = '$anneeSortie'
            AND cover = '$cover' AND artiste = '$artiste'";
        }
        else{
            $query = "SELECT * FROM produit WHERE titre = '$titre' AND genre = '$genre' AND anneeSortie = '$anneeSortie'
            AND artiste = '$artiste'";
        }
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        $results = $stmt->fetchAll();

        return $results;
    }

    public function rechercheAvecId($idProduit,$titre)
    {
        $query = "SELECT * FROM produit WHERE idProduit = '$idProduit' AND titre = '$titre'";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        $results = $stmt->fetchAll();

        return $results;
    }

    public function supprimer($idProduit,$titre,$artiste,$genre,$anneeSortie): bool
    {
        if(!$this->verifExistePas($titre,$genre,$anneeSortie,"",$artiste))
        {
            if($this->gestionStock->supprimer($idProduit)){
                $query = "DELETE FROM produit WHERE idProduit = '$idProduit'";
                $stmt = $this->db->prepare($query);
    
                $stmt->execute();
                return true;
            }
        }
        return false;
    }

    public function chercheToutLesProduits()
    {
        $query = "SELECT produit.*, gestion_stock.qteStock FROM produit, gestion_stock WHERE produit.idProduit = gestion_stock.idProduit";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        $results = $stmt->fetchAll();

        return $results;
    }

    public function chercheToutLesProduitsArtiste($artiste)
    {
        $query = "SELECT produit.*, gestion_stock.qteStock FROM produit, gestion_stock WHERE produit.idProduit = gestion_stock.idProduit AND artiste = '$artiste'";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        $results = $stmt->fetchAll();

        return $results;
    }

    public function chercheToutLesProduitsGenre($genre)
    {
        $query = "SELECT produit.*, gestion_stock.qteStock FROM produit, gestion_stock WHERE produit.idProduit = gestion_stock.idProduit AND genre = '$genre'";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        $results = $stmt->fetchAll();

        return $results;
    }

    public function selectInfoProduitStockCritique()
    {
        $query = "SELECT produit.idProduit,idStock,titre,qteStock,prixAchat,emailF,nomF FROM produit,gestion_stock,fournisseur 
        WHERE produit.idProduit = gestion_stock.idProduit
        AND gestion_stock.idFournisseur = fournisseur.idFournisseur
        AND gestion_stock.qteStock <=5";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        $results = $stmt->fetchAll();

        return $results;
    }

    public function verifProduit($idProduit,$titre) : bool
    {
        $results = $this->rechercheAvecId($idProduit,$titre);
        if (empty($results)) {
            return false;
        } 
        return true;
        
    }

}

?>