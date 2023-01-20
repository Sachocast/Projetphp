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
        if($this->verifExistePas($emailF))
        {
            $query = "insert into fournisseur (nomF, emailF) 
            values (:nomF, :emailF)";
            $stmt = $this->db->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    
            $stmt->execute([
                'nomF' => $nomF,
                'emailF' => $emailF
            ]);
        }        
    }

    private function verifExistePas($emailF)
    {
        $results = $this->recherche($emailF);
        if (empty($results)) {
            return true;
        } 
        return false;
    }

    public function recherche($emailF)
    {
        $query = "SELECT * FROM fournisseur WHERE emailF = :emailF";
        $stmt = $this->db->prepare($query,  [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $stmt->execute([
            'emailF' => $emailF
        ]);
        
        $results = $stmt->fetchAll();

        return $results;
    }

    

}

?>