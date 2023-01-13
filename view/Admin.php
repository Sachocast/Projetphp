<?php $title = "Admin"; ?>

<div id="rechercheProduit">
    <h2>Rechercher un Produit</h2>
    <form action="" method="post">
        <fieldset>
            <label>Titre</label>
            <input type="text" name="titreAlbum"/>
        </fieldset>
        <fieldset>
            <label>Artiste</label>
            <input type="text" name="Artiste"/>
        </fieldset>
        <fieldset>
            <label>Genre</label>
            <input type="text" name="Genre"/>
        </fieldset>
        <fieldset>
            <label>Année de sortie</label>
            <input type="text" name="AnneeSortie"/>
        </fieldset>
        <fieldset>
            <input type="hidden" name="page" value="rechercheProduit">
            <button type="submit">Valider</button>
        </fieldset>
    </form>

    <div id="ajoutProduit">
    <h2>Ajouter un Produit</h2>
    <form action="" method="post">
        <fieldset>
            <label>Titre</label>
            <input type="text" name="titreAlbum"/>
        </fieldset>
        <fieldset>
            <label>Artiste</label>
            <input type="text" name="Artiste"/>
        </fieldset>
        <fieldset>
            <label>Genre</label>
            <input type="text" name="Genre"/>
        </fieldset>
        <fieldset>
            <label>Année de sortie</label>
            <input type="text" name="AnneeSortie"/>
        </fieldset>
        <fieldset>
            <label>Descriptif</label>
            <input type="text" name="descriptif"/>
        </fieldset>
        <fieldset>
            <label>Cover</label>
            <input type="text" name="Cover"/>
        </fieldset>
        <fieldset>
            <label>Prix achat</label>
            <input type="text" name="prixAchat"/>
        </fieldset>
        <fieldset>
            <label>Prix public</label>
            <input type="text" name="prixPublic"/>
        </fieldset>
        <fieldset>
            <input type="hidden" name="page" value="ajoutProduit">
            <button type="submit">Valider</button>
        </fieldset>
    </form>

    <div id="supprimerProduit">
    <h2>Supprimer un Produit</h2>
    <form action="" method="post">
        <fieldset>
            <label>Id du produit</label>
            <input type="text" name="idProduit"/>
        </fieldset>
        <fieldset>
            <label>Titre</label>
            <input type="text" name="titreAlbum"/>
        </fieldset>
        <fieldset>
            <label>Artiste</label>
            <input type="text" name="Artiste"/>
        </fieldset>
        <fieldset>
            <label>Genre</label>
            <input type="text" name="Genre"/>
        </fieldset>
        <fieldset>
            <label>Année de sortie</label>
            <input type="text" name="AnneeSortie"/>
        </fieldset>
        <fieldset>
            <input type="hidden" name="page" value="ajoutProduit">
            <button type="submit">Valider</button>
        </fieldset>
    </form>
</div>