<?php
    // Connexion :
    $servername = "localhost";
    // Bloc try / catch pour encapsuler le code et gérer les erreurs

    try {
    // Création d’un nouvel objet pour se connecter
    $db = new PDO("mysql:host=localhost;dbname=projet3.01;charset=utf8", 'root','');
    // Affectation de PDO au mode d’exception d’erreur
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }
    // Capture de l’erreur (éventuellement)
    catch(PDOException $e) {
    echo "La connexion a échoué : " . $e->getMessage();
    }
    

?>
