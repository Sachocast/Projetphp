<?php

class ConnexionDB
{

    private $db;
    public function getDB()
    {
        if($this->db == null)
        {
            try {
            $this->db = new PDO("mysql:host=localhost;port=5432;dbname=cs102126@projet3.01", 'cs102126','Luffy_c03');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e) {
                echo "La connexion a échoué : " . $e->getMessage();
            }
        }
        return $this->db;
    }
}

?>
