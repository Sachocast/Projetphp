<?php

class GestionFournisseur
{
    private $db;

    public function __construct(PDO $bdd)
    {
        $this->db = $bdd;
    }

    public function insert($nomF,$emailF)
    {
        if($this->verifExistePas($nomF,$emailF))
        {
            $query = "insert into fournisseur (nomF, emailF) 
            values ('$nomF', '$emailF')";
            $stmt = $this->db->prepare($query);
    
            $stmt->execute();
        }        
    }

    private function verifExistePas($nomF,$emailF)
    {
        $results = $this->recherche($nomF,$emailF);
        if (empty($results)) {
            return true;
        } 
        return false;
    }

    public function recherche($nomF,$emailF)
    {
        $query = "SELECT * FROM fournisseur WHERE nomF = '$nomF' AND emailF = '$emailF'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        $results = $stmt->fetchAll();

        return $results;
    }


}

?>