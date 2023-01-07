<?php

class ConnexionDB
{

    private $db;
    public function getDB()
    {
        if($this->db == null)
        {
            try {
            $this->db = new PDO("mysql:host=localhost;dbname=projet3.01;charset=utf8", 'root','');
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
