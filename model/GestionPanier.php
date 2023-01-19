<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
class GestionPanier 
{

    private $db;

    public function __construct(PDO $bdd)
    {
        $this->db = $bdd;
    }

    public function createSessionPanier(array $array)
    {
        if(!isset($_SESSION['panier'])){
            $panier = [$array[0]['idProduit']];
            
            $_SESSION['panier'] = json_encode($panier);
        }
        else
        {
            $panier = json_decode($_SESSION['panier'], true);
            array_push($panier, $array[0]['idProduit']);
            $_SESSION['panier'] = json_encode($panier);

        }
    }

    public function chercheLesProduitsDuPanier()
    {
        if(isset($_SESSION['panier'])){
            $panier = [];
            foreach (json_decode($_SESSION['panier'], true) as $idProduit){ 
                $query = "SELECT * FROM produit WHERE idProduit = '$idProduit'";

                $stmt = $this->db->prepare($query);
                $stmt->execute();
            
                array_push($panier,$stmt->fetchAll());
            }
            return $panier;
        }
    }

    private function calculPrix()
    {
        $prix = 0;
        $result = [];
        foreach (json_decode($_SESSION['panier'], true) as $idProduit){ 
            $query = "SELECT produit.prixPublic FROM produit WHERE idProduit = '$idProduit'";

            $stmt = $this->db->prepare($query);
            $stmt->execute();
        
            $result = $stmt->fetchAll();
            $prix+= $result[0]['prixPublic'];
        }
        return $prix;
    }

    public function createFacture()
    {
        if(isset($_SESSION['panier']) && isset($_SESSION['email']))
        {
            try{
                $email = $_SESSION['email']; $nom = $_SESSION['nomUtil']; 
                $prix = $this->calculPrix(); $date = date("Y-m-d");
                $query = "insert into facturation (dateCreation, emailClient, nomClient, prix, valider) 
                values ('$date', '$email', '$nom', '$prix','0')";
                $stmt = $this->db->prepare($query);
        
                $stmt->execute();
                $this->createListeProduit();
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }

    public function deleteFacture()
    {
        if(isset($_SESSION['email']) ){
            try{
                $this->deleteListeProduit();
                $email = $_SESSION['email'];
                $query = "DELETE FROM facturation WHERE emailClient = '$email' and valider = '0'";
                $stmt = $this->db->prepare($query);

                $stmt->execute();
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }

    public function createListeProduit()
    {
        if(isset($_SESSION['panier']) && isset($_SESSION['email']))
        {
            $panier = json_decode($_SESSION['panier']);
            $count = [];
            $val = [];
            for($j = 0; $j <count($panier); $j++) { 
                $cpt =0; $verify = false;
                foreach($val as $k){
                    if($panier[$j]==$k) $verify = true;
                }
                if(!$verify){
                    for($index = 0; $index < count($panier); $index++) 
                    {
                        if($panier[$j] == $panier[$index])
                        {
                            $cpt++;
                        }
                    }
                    array_push($count, $cpt);
                    array_push($val, $panier[$j]);
                }
            }
            $_SESSION['count'] = json_encode($count);
            $produitUnique = array_unique($panier, SORT_REGULAR);
            $this->insertListeProduit($count, $produitUnique);
        }
    }


    private function selectPrixProduit($idProduit)
    {
        try{
            $query = "SELECT produit.prixPublic FROM produit WHERE idProduit = '$idProduit'";
            $stmt = $this->db->prepare($query);

            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result[0]['prixPublic'];

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    private function insertListeProduit($count,$produitUnique)
    {
        try{
            $i=0;
            $panier = $this->selectFacture();
            $idPanier=$panier[0]['IdPanier'];
            foreach ($produitUnique as $produit) :
                $idProduit = $produit;
                $qte = $count[$i]; $prix = $this->selectPrixProduit($idProduit); $date = date("Y");
                $query = "insert into listeProduit (idProduit, qte, prixDuProduit, idPanier, date) 
                values ('$idProduit','$qte', '$prix','$idPanier', $date)";
                $stmt = $this->db->prepare($query);

                $stmt->execute();
                $i++;
            endforeach;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    private function deleteListeProduit()
    {
        try{
            $panier = $this->selectFacture();
            if(!empty($panier)){
            $idPanier=$panier[0]['IdPanier'];
            $query = "DELETE FROM listeProduit WHERE idPanier = '$idPanier'";
            $stmt = $this->db->prepare($query);

            $stmt->execute();}
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function viderPanier()
    {
        unset($_SESSION['panier']);
    }

    public function selectFacture()
    {
        try{
            $email = $_SESSION['email'];
            $query = "SELECT * FROM facturation WHERE emailClient = '$email' and valider = '0'";
            $stmt = $this->db->prepare($query);

            $stmt->execute();
            $result = $stmt->fetchAll();
            if(!empty($result)){$_SESSION['prix']= $result[0]['prix'];}
            return $result;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function selectListeProduit()
    {
        try{
            $panier = $this->selectFacture();
            $idPanier=$panier[0]['IdPanier'];
            $query = "SELECT * FROM listeProduit WHERE idPanier = '$idPanier'";
            $stmt = $this->db->prepare($query);

            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
    public function selectInfo()
    {
        try{
            $panier = json_decode($_SESSION['panier']);
            $produitUnique = array_unique($panier, SORT_REGULAR);
            $result = [];
            for($j = 0; $j <count($produitUnique); $j++) { 
                if(isset($produitUnique[$j])){
                $id = $produitUnique[$j];
                $query = "SELECT produit.titre, produit.cover FROM produit,listeProduit WHERE produit.idProduit = listeProduit.idProduit AND produit.idProduit = '$id'";
                $stmt = $this->db->prepare($query);

                $stmt->execute();
                array_push($result,$stmt->fetchAll());}
            }

        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return $result;
    }

    public function finPaiement()
    {
        try{
            $email = $_SESSION['email'];
            $query = "UPDATE facturation SET valider ='1' WHERE emailClient = '$email' and valider = '0'";
            $stmt = $this->db->prepare($query);

            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}

?>