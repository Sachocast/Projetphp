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
        $date = date("Y");
        $query = "SELECT * FROM compta WHERE annee = '$date'";
 
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        $results = $stmt->fetchAll();

        if (empty($results)) {
            return true;
        } 
        return false;
    }

    private function insertCompta()
    {
        try{
            $date = date("Y");
            $query = "insert into compta (annee, produitvendu, chiffreAffaire, achat, montant) 
            values ('$date', '0', '0', '0','0')";
            $stmt = $this->db->prepare($query);
    
            $stmt->execute();
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
            $date = date("Y"); $prix = $_SESSION['prix'];
            $query = "UPDATE compta SET chiffreAffaire= chiffreAffaire+$prix WHERE annee = '$date'";
            $stmt = $this->db->prepare($query);

            $stmt->execute();
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
            $date = date("Y");$debit = $debit*$qte;
            $query = "UPDATE compta SET debit= debit+$debit WHERE annee = '$date'";
            $stmt = $this->db->prepare($query);

            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    

}

?>