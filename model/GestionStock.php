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
            $idFournisseur = $this->chercheIdFournisseur($emailF);
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

    private function chercheIdFournisseur($emailF)
    {
        $fournisseur = $this->gestionFournisseur->recherche($emailF);
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

    public function chercheToutLesStocks()
    {
        $query = "SELECT * FROM gestion_stock ";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        $results = $stmt->fetchAll();

        return $results;
    }

    public function verifStocks(): bool
    {
        $results = $this->chercheToutLesStocks();
        foreach($results as $row)
        {
            if($row['qteStock'] <=5)
            { return true; }
        }
               
        return false;
    }

    public function updateQteStock($idProduit, $qteAajouté)
    {
        $query = "UPDATE gestion_stock SET qteStock = qteStock + $qteAajouté WHERE gestion_stock.idProduit = $idProduit";
        $stmt = $this->db->prepare($query);
    
        $stmt->execute();
    }

    public function updateFournisseur($idProduit,$nomF,$emailF)
    {
        $this->gestionFournisseur->insert($nomF,$emailF);
        $fournisseur = $this->gestionFournisseur->recherche($emailF);
        $idF = $fournisseur[0]['idFournisseur'];
        $stock = $this->recherche($idProduit);
        $idS = $stock[0]['idStock'];

        $query = "UPDATE gestion_stock SET idFournisseur = $idF WHERE gestion_stock.idStock = $idS";
        $stmt = $this->db->prepare($query);
    
        $stmt->execute();
    }

    public function metAjourStock()
    {
        $panier = json_decode($_SESSION['panier']);
        $produitUnique = array_unique($panier, SORT_REGULAR);
        $count = json_decode($_SESSION['count']);
        $i = 0;
        foreach ($produitUnique as $idProduit) :
            $id = $idProduit; $qte = $count[$i];
            try{
                $query = "UPDATE gestion_stock SET qteStock= qteStock-$qte WHERE idProduit = '$id'";
                $stmt = $this->db->prepare($query);
    
                $stmt->execute();
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            $i++;            
        endforeach;
    }
}

?>