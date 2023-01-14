<?php $title = "Login"; ?>

<div id="formCreation">
    <h2>Créé compte<h2>
    <form action="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/controller/Router.php" method="post">
        <fieldset>
            <label>Nom utilisateur</label>
            <input type="text" required="required" name="nomUtil">
        </fieldset>
        <fieldset>
            <label><?= $login[0] ?></label>
            <label>Email</label>
            <input type="email" name="email" required="required"/>
        </fieldset>
        <fieldset>
            <label>Mot de passe</label>
            <input type="password" name="mdp" required="required"/>
        </fieldset>
        <fieldset>
            <label><?= $login[1] ?></label>
            <label>Numero telephone</label>
            <input type="text" name="numTel" required="required">
        </fieldset>
        <fieldset>
            <label>Pays</label>
            <input type="text" name="pays" required="required">
        </fieldset>
        <fieldset>
            <label>Ville</label>
            <input type="text" name="ville" required="required">
        </fieldset>
        <fieldset>
            <input type="hidden" name="page" value="ajoutClient">
            <button type="submit">Valider</button>
        </fieldset>
    </form>
</div>

<div id="formConnexion">
    <h2>Connexion<h2>
    <form action="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/controller/Router.php" method="post">
        <fieldset>
            <label>Email</label>
            <label><?= $login[2] ?></label>
            <input type="email" name="email" required="required"/>
        </fieldset>
        <fieldset>
            <label>Mot de passe</label>
            <label><?= $login[3] ?></label>
            <input type="password" name="mdp" required="required"/>
        </fieldset>
        <fieldset>
            <input type="hidden" name="page" value="connexion">
            <button type="submit">Valider</button>
        </fieldset>
    </form>
</div>
