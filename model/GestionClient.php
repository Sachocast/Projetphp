<?php

class GestionClient
{

    private $db;

    public function __construct(PDO $bdd)
    {
        $this->db = $bdd;
    }

    public function insert($email,$nomUtil,$mdp,$numTel,$pays,$ville)
    {
        $query = "insert into client (email, nomUtilisateur, mdp, numTel, pays, ville, admin) 
        values ('$email', '$nomUtil', '$mdp', '$numTel','$pays','$ville','0')";
        $stmt = $this->db->prepare($query);

        $stmt->execute();
    }

    public function verifEmail($email,$mdp)
    {
        $query = "SELECT * FROM client WHERE email = '$email'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        $results = $stmt->fetchAll();
        if (empty($results)) {
            return 3;
        } 
        
        return $this->verifMdp($email, $mdp);

    }

    private function verifMdp($email, $mdp)
    {
               
        $results = $this->select($email,$mdp);
        if (empty($results)) {
         // traitement des résultats
            return 4;
        } 
        return 0;
    }

    public function select($email,$mdp)
    {
        $query = "SELECT * FROM client WHERE  email = '$email' AND mdp = '$mdp'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
 
        return $stmt->fetchAll();

    }


    public function connection($email,$mdp)
    {

        $client = $this->select($email,$mdp);

        foreach($client as $row) {
            setcookie('email',$row['email'],time()+(86400*30));
            setcookie('nomUtil',$row['nomUtilisateur'],time()+(86400*30));
            setcookie('mdp',$row['mdp'],time()+(86400*30));
            setcookie('pays',$row['pays'],time()+(86400*30));
            setcookie('ville',$row['ville'],time()+(86400*30));
            setcookie('admin',$row['admin'],time()+(86400*30));
            setcookie('numTel',$row['numTel'],time()+(86400*30));
          }

          $_SESSION['email']=$_COOKIE['email'];
          $_SESSION['nomUtil']=$_COOKIE['nomUtil'];
          $_SESSION['mdp']=$_COOKIE['mdp'];
          $_SESSION['pays']=$_COOKIE['pays'];
          $_SESSION['ville']=$_COOKIE['ville'];
          $_SESSION['admin']=$_COOKIE['admin'];
          $_SESSION['numTel']=$_COOKIE['numTel'];
        
    }

    public function deconnection()
    {
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();
    }


}

?>