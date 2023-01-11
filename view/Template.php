

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/assets/css/Style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

</head>
<body>      

    <header>
        <div class="logo">
        <form action="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/controller/Router.php" method="post">
                <input type="hidden" name="page" value="accueil">
                <input id="imgLogo" type="image" src="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/assets/img/logo.png" width=10% onclick="submit()">
            </form>
        </div>

        <div class="recherche">
            //si possible barre de recherche
        </div>

        <div class="Login">
            <form action="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/controller/Router.php" method="post">
                <input type="hidden" name="page" value="login">
                <input id="imgLogin" type="image" src="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/assets/img/login.png" width=10% onclick="submit()">
            </form>
            
        </div>
        <?php
            if (isset($_SESSION['email'])) { ?>
                <div class="Logout">
                    <form action="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/controller/Router.php" method="post">
                        <input type="hidden" name="page" value="logout">
                        <input id="imgLogout" type="image" src="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/assets/img/logout.png" width=10% onclick="submit()">
                    </form>
                </div> <?php
            }
        ?>

        <div class="linkPanier">
            <a href="Panier.php">
                <img id="imgPanier" src="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/assets/img/panier.jpg" >
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