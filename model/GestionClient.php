<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
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

        $this->connection($email,$mdp);
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
            $_SESSION['email']=$row['email'];
            $_SESSION['nomUtil']=$row['nomUtilisateur'];
            $_SESSION['mdp']=$row['mdp'];
            $_SESSION['pays']=$row['pays'];
            $_SESSION['ville']=$row['ville'];
            $_SESSION['admin']=$row['admin'];
            $_SESSION['numTel']=$row['numTel'];
          }
          $this->createCookies();
    }

    private function createCookies()
    {
        setcookie('email',$_SESSION['email'],time()+(86400*30));
        setcookie('nomUtil',$_SESSION['nomUtil'],time()+(86400*30));
        setcookie('mdp',$_SESSION['mdp'],time()+(86400*30));
        setcookie('pays',$_SESSION['pays'],time()+(86400*30));
        setcookie('ville',$_SESSION['ville'],time()+(86400*30));
        setcookie('admin',$_SESSION['admin'],time()+(86400*30));
        setcookie('numTel',$_SESSION['numTel'],time()+(86400*30));
    }

    private function destroyCookies()
    {
        setcookie('email',"",time()-(86400*30));
        setcookie('nomUtil',"",time()-(86400*30));
        setcookie('mdp',"",time()-(86400*30));
        setcookie('pays',"",time()-(86400*30));
        setcookie('ville',"",time()-(86400*30));
        setcookie('admin',"",time()-(86400*30));
        setcookie('numTel',"",time()-(86400*30));
    }

    public function deconnection()
    {
        $this->destroyCookies();
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