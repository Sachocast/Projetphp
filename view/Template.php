<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./css/Style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

</head>

<body>      

    <header>
        <div class="logo">
            <img id="imgLogo" src="./img/logo.png" width=10%>
        </div>

        <div class="recherche">
            //si possible barre de recherche
        </div>

        <div class="Login">
            <a href="Login.html">
                <img id="imgLogin"  src="./img/login.png" width=10%>
            </a>
        </div>

        <div class="linkPanier">
            <a href="Panier.php">
                <img id="imgPanier" src="./img/panier.jpg" >
            </a>    
        </div>
    </header>


    <main>

        <?= $content ?>

    </main>


    <footer>

        <a href="Contact.html">Contacter nous</a>

    </footer>

</body>


</html> 