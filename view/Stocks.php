<?php $title = "Stocks"; ?>


<?php foreach ($produitsCritique as $produit) : ?>
    <p><?= $produit['idProduit'] ?><p>
    <p><?= $produit['idStock'] ?><p>
    <p><?= $produit['titre'] ?><p>
    <p><?= $produit['qteStock'] ?><p>
    <p><?= $produit['prixAchat'] ?><p>
    <p><?= $produit['emailF'] ?><p>
    <p><?= $produit['nomF'] ?><p>
    <br>
<?php endforeach ?>

<div id=ajoutQteStock>
<h2>Passer Commande</h2>
<label><strong> <?= $verifErreur[0] ?></strong></label>
    <form action="/controller/Router.php" method="post">
        <fieldset>
            <label>Id du produit</label>
            <input type="text" name="idProduit" required="required"/>
        </fieldset>
        <fieldset>
            <label>Titre</label>
            <input type="text" name="titreAlbum" required="required"/>
        </fieldset>
        <fieldset>
            <label>Quantite</label>
            <input type="text"  pattern='[0-9]*' name="qte" required="required"/>
        </fieldset>
        <fieldset>
            <input type="hidden" name="action" value="passerCommande">
            <button type="submit">Valider</button>
        </fieldset>
    </form>
</div>

<div id=ajoutQteStock>
<h2>Changer fournisseur</h2>
<label><strong> <?= $verifErreur[1] ?></strong></label>
    <form action="/controller/Router.php" method="post">
        <fieldset>
            <label>Id du produit</label>
            <input type="text" name="idProduit" required="required"/>
        </fieldset>
        <fieldset>
            <label>Titre</label>
            <input type="text" name="titreAlbum" required="required"/>
        </fieldset>
        <fieldset>
            <label>Fournisseur</label>
            <input type="text" name="nomF" required="required"/>
        </fieldset>
        <fieldset>
            <label>Email Fournisseur</label>
            <input type="text" name="emailF" required="required"/>
        </fieldset>
        <fieldset>
            <input type="hidden" name="action" value="updateFournisseur">
            <button type="submit">Valider</button>
        </fieldset>
    </form>
</div>
