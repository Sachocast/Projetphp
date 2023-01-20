<?php $title = "FinPaiement"; ?>

<h2>Votre commande a été validée, un email de confirmation vous a été envoyé.</h2>
<form action="/controller/Router.php" method="post">
        <input type="hidden" name="action" value="accueil">
        <button type="submit">Retourner à l'accueil</button>
    </form>