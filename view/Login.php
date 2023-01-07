<?php $title = "Login"; ?>

<div id="formCreation">
    <h2>Créé compte<h2>
    <form action="" methode="post">
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
        <fieldset>
            <label>Confirmer mot de passe</label>
            <input type="password" name="password" required="required"/>
        </fieldset>
        <fieldset>
            <label>Numero telephone</label>
            <input type="text" name="numTek" required="required">
        </fieldset>
        <fieldset>
            <label>Pays</label>
            <input type="text" name="pays" required="required">
        </fieldset>
        <fieldset>
            <label>Ville</label>
            <input type="text" name="ville" required="required">
        </fieldset>
        <button type="submit">Valider</button>
    </form>
</div>

<div id="formConnexion">
    <h2>Connexion<h2>
    <form action="" methode="post">
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
