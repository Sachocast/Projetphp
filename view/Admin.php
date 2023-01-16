<?php $title = "Admin"; ?>

<div id="rechercheProduit">
    <h2>Rechercher un Produit</h2>
    <label><strong><?= $admin[1] ?></strong></label>
    <form action="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/controller/Router.php" method="post">
        <fieldset>
            <label>Titre</label>
            <input type="text" name="titreAlbum"/>
        </fieldset>
        <fieldset>
            <label>Artiste</label>
            <input type="text" name="artiste"/>
        </fieldset>
        <fieldset>
            <label>Genre</label>
            <input type="text" name="genre"/>
        </fieldset>
        <fieldset>
            <label>Année de sortie</label>
            <input type="text" name="anneeSortie"/>
        </fieldset>
        <fieldset>
            <input type="hidden" name="action" value="rechercheProduit">
            <button type="submit">Valider</button>
        </fieldset>
    </form>
</div>

<div id="ajoutProduit">
    <h2>Ajouter un Produit</h2>
    <label><strong><?= $admin[0] ?></strong></label>
    <form action="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/controller/Router.php" method="post">
        <fieldset>
            <label>Titre</label>
            <input type="text" name="titreAlbum" required="required"/>
        </fieldset>
        <fieldset>
            <label>Artiste</label>
            <input type="text" name="artiste" required="required"/>
        </fieldset>
        <fieldset>
            <label>Genre</label>
            <input type="text" name="genre" required="required"/>
        </fieldset>
        <fieldset>
            <label>Année de sortie</label>
            <input type="text" pattern='[0-9]*'  name="anneeSortie"required="required"/>
        </fieldset>
        <fieldset>
            <label>Descriptif</label>
            <input type="text" name="descriptif" required="required"/>
        </fieldset>
        <fieldset>
            <label>Cover</label>
            <input type="text" name="cover" required="required"/>
        </fieldset>
        <fieldset>
            <label>Prix achat</label>
            <input type="text" pattern='[0-9]*'  name="prixAchat" required="required"/>
        </fieldset>
        <fieldset>
            <label>Prix public</label>
            <input type="text" pattern='[0-9]*'  name="prixPublic" required="required"/>
        </fieldset>
        <fieldset>
            <label>Fournisseur</label>
            <input type="text" name="nomF" required="required"/>
        </fieldset>
        <fieldset>
            <label>Email fournisseur</label>
            <input type="text" name="emailF" required="required"/>
        </fieldset>
        <fieldset>
            <label>Stock</label>
            <input type="text" pattern='[0-9]*'  name="qteStock" required="required"/>
        </fieldset>
        <fieldset>
            <input type="hidden" name="action" value="ajoutProduit">
            <button type="submit">Valider</button>
        </fieldset>
    </form>
</div>

<div id="supprimerProduit">
    <h2>Supprimer un Produit</h2>
    <label><strong><?= $admin[2] ?></strong></label>
    <form action="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/controller/Router.php" method="post">
        <fieldset>
            <label>Id du produit</label>
            <input type="text" pattern='[0-9]*'  name="idProduit" required="required"/>
        </fieldset>
        <fieldset>
            <label>Titre</label>
            <input type="text" name="titreAlbum" required="required"/>
        </fieldset>
        <fieldset>
            <label>Artiste</label>
            <input type="text" name="artiste" required="required"/>
        </fieldset>
        <fieldset>
            <label>Genre</label>
            <input type="text" name="genre" required="required"/>
        </fieldset>
        <fieldset>
            <label>Année de sortie</label>
            <input type="text" pattern='[0-9]*'  name="anneeSortie" required="required"/>
        </fieldset>
        <fieldset>
            <input type="hidden" name="action" value="supprimerProduit">
            <button type="submit">Valider</button>
        </fieldset>
    </form>
</div>

<div id="redirigeStocks">
    <form action="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/controller/Router.php" method="post">
        <input type="hidden" name="action" value="stocks">
        <button type="submit">Gerer les stocks</button>
    </form>
</div>