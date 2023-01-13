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
                <input id="imgLogo" type="image" src="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/assets/img/site/logo.png" width=10% onclick="submit()" alt="logo">
            </form>
        </div>

        <div class="recherche">
            //si possible barre de recherche
        </div>

        <div class="Login">
            <form action="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/controller/Router.php" method="post">
                <input type="hidden" name="page" value="login">
                <input id="imgLogin" type="image" src="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/assets/img/site/login.png" width=10% onclick="submit()" alt="login">
            </form>
            
        </div>
        <?php
            if (isset($_SESSION['email']) && $_SESSION['admin']== true) { ?>
                <div class="admin">
                    <form action="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/controller/Router.php" method="post">
                        <input type="hidden" name="page" value="admin">
                        <input id="imgAdmin" type="image" src="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/assets/img/site/admin.png" width=10% onclick="submit()" alt="admin">
                    </form>
                </div> <?php
            }
        ?>
        <?php
            if (isset($_SESSION['email'])) { ?>
                <div class="Logout">
                    <form action="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/controller/Router.php" method="post">
                        <input type="hidden" name="page" value="logout">
                        <input id="imgLogout" type="image" src="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/assets/img/site/logout.png" width=10% onclick="submit()" alt="logout">
                    </form>
                </div> <?php
            }
        ?>

        <div class="linkPanier">
        <form action="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/controller/Router.php" method="post">
                <input type="hidden" name="page" value="panier">
                <input id="imgPanier" type="image" src="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/assets/img/site/panier.jpg" width=10% onclick="submit()" alt="panier">
            </form> 
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