<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/assets/css/Style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

</head>
<body>      

    <header>
        <div class="logo">
            <form action="/controller/Router.php" method="post">
                <input type="hidden" name="action" value="accueil">
                <input id="imgLogo" type="image" src="/assets/img/site/logo.png" width=10% onclick="submit()" alt="logo">
            </form>
        </div>

        <?php
            if (isset($_SESSION['avertissementStock']) && $_SESSION['avertissementStock']== true) { ?>
                <div class="qteStock">
                    <form action="/controller/Router.php" method="post">
                        <input type="hidden" name="action" value="stocks">
                        <button type="submit">STOCK CRITIQUE</button>
                    </form>
                </div> <?php
            }
        ?>

        <div class="Login">
            <form action="/controller/Router.php" method="post">
                <input type="hidden" name="action" value="login">
                <input id="imgLogin" type="image" src="/assets/img/site/login.png" width=10% onclick="submit()" alt="login">
            </form>
            
        </div>
        <?php
            if (isset($_SESSION['email']) && isset($_SESSION['admin'])) {
                if($_SESSION['admin']==true) { ?>

                <div class="admin">
                    <form action="/controller/Router.php" method="post">
                        <input type="hidden" name="action" value="admin">
                        <input id="imgAdmin" type="image" src="/assets/img/site/admin.png" width=10% onclick="submit()" alt="admin">
                    </form>
                </div> <?php }
            }
        ?>
        <?php
            if (isset($_SESSION['email'])) { ?>
                <div class="Logout">
                    <form action="/controller/Router.php" method="post">
                        <input type="hidden" name="action" value="logout">
                        <input id="imgLogout" type="image" src="/assets/img/site/logout.png" width=10% onclick="submit()" alt="logout">
                    </form>
                </div> <?php
            }
        ?>

        <div class="linkPanier">
        <form action="/controller/Router.php" method="post">
                <input type="hidden" name="action" value="panier">
                <input id="imgPanier" type="image" src="/assets/img/site/panier.jpg" width=10% onclick="submit()" alt="panier">
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