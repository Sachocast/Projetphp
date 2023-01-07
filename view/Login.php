<?php $title = "Login"; ?>

<div id="formCreation">
    <h2>Créé compte<h2>
    <form action="/phpsite/Projetphp/controller/Router.php" method="post">
        <fieldset>
            <label>Nom utilisateur</label>
            <input type="text" name="nomUtil"required="required">
        </fieldset>
        <fieldset>
            <label>Email</label>
            <input type="email" name="email" required="required"/>
        </fieldset>
        <fieldset>
            <label>Mot de passe</label>
            <input type="password" name="mdp" required="required"/>
        </fieldset>
        <fieldset>
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
            <input type="button" value="Valider" onclick="submit()">
        </fieldset>
    </form>
</div>

<div id="formConnexion">
    <h2>Connexion<h2>
    <form action="" method="post">
        <fieldset>
            <label>Nom utilisateur</label>
            <input type="text" name="nomUtil">
        </fieldset>
        <fieldset>
            <label>Email</label>
            <input type="email" name="email" required="required"/>
        </fieldset>
        <fieldset>
            <label>Mot de passe</label>
            <input type="password" name="password" required="required"/>
        </fieldset>
        <button type="submit">Valider</button>
    </form>
</div>
