<?php

class GestionCompta
{

    private $db;

    public function __construct(PDO $bdd)
    {
        $this->db = $bdd;
    }

    private function verifCompta(): bool
    {   
        $annee = date("Y");
        $query = "SELECT * FROM compta WHERE annee = :annee";
 
        $stmt = $this->db->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $stmt->execute([
            'annee' => $annee
        ]);
        
        $results = $stmt->fetchAll();

        if (empty($results)) {
            return true;
        } 
        return false;
    }

    private function insertCompta()
    {
        try{
            $annee = date("Y");
            $query = "insert into compta (annee,chiffreAffaire, debit) 
            values (:annee, '0', '0')";
            $stmt = $this->db->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    
            $stmt->execute([
                'annee' => $annee
            ]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function metAjourCA()
    {
        if($this->verifCompta())
        {
            $this->insertCompta();
        }
        try{
            $annee = date("Y"); $prix = $_SESSION['prix'];
            $query = "UPDATE compta SET chiffreAffaire= chiffreAffaire+:prix WHERE annee = :annee";
            $stmt = $this->db->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);

            $stmt->execute([
                'prix' => $prix,
                'annee' => $annee
            ]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function metAjourDebit($debit,$qte)
    {
        if($this->verifCompta())
        {
            $this->insertCompta();
        }
        try{
            $annee = date("Y");$nvdebit = $debit*$qte;
            $query = "UPDATE compta SET debit= debit+:nvdebit WHERE annee = :annee";
            $stmt = $this->db->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);

            $stmt->execute([
                'nvdebit' => $nvdebit,
                'annee' => $annee
            ]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
    public function insertListeAchat($idProduit,$qte,$prixAchat)
    {
        try{
            $annee = date("Y");
            $query = "insert into listeAchat (idProduit, qte, prixAchat, annee) 
            values (:idProduit, :qte, :prixAchat, :annee)";
            $stmt = $this->db->prepare($query,  [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);

            $stmt->execute([
                'idProduit' => $idProduit,
                'qte' => $qte,
                'prixAchat' => $prixAchat,
                'annee' => $annee
            ]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function selectAnnee()
    {
        try{
            $annee = date("Y");
            $query = "SELECT * FROM compta WHERE annee = annee";
            $stmt = $this->db->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);

            $stmt->execute([
                'annee' => $annee
            ]);
            $results = $stmt->fetchAll();

            return $results;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function selectCredit()
    {
        try{
            $annee = date("Y");
            $query = "SELECT listeProduit.*, produit.titre FROM listeProduit,produit WHERE annee = :annee AND produit.idProduit=listeProduit.idProduit";
            $stmt = $this->db->prepare($query,  [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);

            $stmt->execute([
                'annee' => $annee
            ]);
            $results = $stmt->fetchAll();

            return $results;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function selectDebit()
    {
        try{
            $annee = date("Y");
            $query = "SELECT listeAchat.*, produit.titre FROM listeAchat,produit WHERE annee = :annee AND produit.idProduit=listeAchat.idProduit";
            $stmt = $this->db->prepare($query,  [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);

            $stmt->execute([
                'annee' => $annee
            ]);
            $results = $stmt->fetchAll();

            return $results;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}

?>