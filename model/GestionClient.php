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

    public function insert($email,$nomUtil,$mdp)
    {
        $query = "insert into client (email, nomUtilisateur, mdp, admin) 
        values (:email, :nomUtil, :mdp,'0')";
        $stmt = $this->db->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);

        $stmt->execute([
            'email' => $email,
            'nomUtil' => $nomUtil,
            'mdp' => $mdp
        ]);

        $this->connection($email,$mdp);
    }

    public function verifEmail($email,$mdp)
    {
        $query = "SELECT * FROM client WHERE email = :email";
        $stmt = $this->db->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $stmt->execute([
            'email' => $email
        ]);
        
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
        $query = "SELECT * FROM client WHERE  email = :email AND mdp = :mdp";
        $stmt = $this->db->prepare($query,  [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $stmt->execute([
            'email' => $email,
            'mdp' => $mdp
        ]);
 
        return $stmt->fetchAll();

    }


    public function connection($email,$mdp)
    {

        $client = $this->select($email,$mdp);

        foreach($client as $row) {
            $_SESSION['email']=$row['email'];
            $_SESSION['nomUtil']=$row['nomUtilisateur'];
            $_SESSION['mdp']=$row['mdp'];
            $_SESSION['admin']=$row['admin'];
          }
          $this->createCookies();
    }

    private function createCookies()
    {
        setcookie('email',$_SESSION['email'],time()+(86400*30));
        setcookie('nomUtil',$_SESSION['nomUtil'],time()+(86400*30));
        setcookie('mdp',$_SESSION['mdp'],time()+(86400*30));
        setcookie('admin',$_SESSION['admin'],time()+(86400*30));
    }

    private function destroyCookies()
    {
        setcookie('email',"",time()-(86400*30));
        setcookie('nomUtil',"",time()-(86400*30));
        setcookie('mdp',"",time()-(86400*30));
        setcookie('admin',"",time()-(86400*30));
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