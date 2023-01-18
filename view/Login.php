<?php $title = "Login"; ?>

<div id="divCreation">
    <h2>Créé compte<h2>
    <form id="formCreation"action="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/controller/Router.php" method="post">
            <label>Nom utilisateur</label>
            <input type="text" required="required" name="nomUtil">
            <label><?= $login[0] ?></label>
            <label>Email</label>
            <input type="email" name="email" required="required"/>
            <label>Mot de passe</label>
            <input type="password" name="mdp" required="required"/>
            <label><?= $login[1] ?></label>
            <label>Numero telephone</label>
            <input type="text" pattern='[0-9]*'  name="numTel" required="required">
            <label>Pays</label>
            <input type="text" name="pays" required="required">
            <label>Ville</label>
            <input type="text" name="ville" required="required">
            <input type="hidden" name="action" value="ajoutClient">
            <button type="submit">Valider</button>
    </form>
</div>

<div id="formConnexion">
    <h2>Connexion<h2>
    <form action="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/controller/Router.php" method="post">
            <label>Email</label>
            <label><?= $login[2] ?></label>
            <input type="email" name="email" required="required"/>
            <label>Mot de passe</label>
            <label><?= $login[3] ?></label>
            <input type="password" name="mdp" required="required"/>
            <input type="hidden" name="action" value="connexion">
            <button type="submit">Valider</button>
    </form>
</div>
