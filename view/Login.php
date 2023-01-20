<?php $title = "Login"; ?>

    <h2 class="h2form">Créé compte<h2>
    <form class="form"action="/controller/Router.php" method="post">
            <label>Nom utilisateur</label>
            <input type="text" pattern="[^\s]+" title="Ne peut pas contenir d'espace" required="required" name="nomUtil">
            <label><?= $login[0] ?></label>
            <label>Email</label>
            <input type="email" name="email" pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.[a-zA-Z.]{2,15}" required="required"/>
            <label>Mot de passe</label>
            <input type="password" pattern="[^\s]+" title="Ne peut pas contenir d'espace" name="mdp" required="required"/>
            <input type="hidden" name="action" value="ajoutClient">
            <button type="submit">Valider</button>
    </form>

    <h2 class="h2form">Connexion<h2>
    <form class="form" action="/controller/Router.php" method="post">
            <label>Email</label>
            <label><?= $login[2] ?></label>
            <input type="email" name="email" pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.[a-zA-Z.]{2,15}" required="required"/>
            <label>Mot de passe</label>
            <label><?= $login[3] ?></label>
            <input type="password" name="mdp" required="required"/>
            <input type="hidden" name="action" value="connexion">
            <button type="submit">Valider</button>
    </form>
