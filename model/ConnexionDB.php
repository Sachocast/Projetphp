<?php

class ConnexionDB
{

    private $db;
    function getDB()
    {
        if($this->db == null)
        {
            try {
            $db = new PDO("mysql:host=localhost;dbname=projet3.01;charset=utf8", 'root','');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e) {
            echo "La connexion a échoué : " . $e->getMessage();
            }
        }
        return $this->db;
    }
}

?>
