<?php $title = "Stocks"; ?>

<div class="horizontal">
    <?php foreach ($produitsCritique as $produit) : ?>
    <div class="vertical">
            <p>idProduit: <?= $produit['idProduit'] ?><p>
            <p>idStock: <?= $produit['idStock'] ?><p>
            <p>titre: <?= $produit['titre'] ?><p>
            <p>quantité en stock: <?= $produit['qteStock'] ?><p>
            <p>prix achat: <?= $produit['prixAchat'] ?><p>
            <p>fournisseur: <?= $produit['nomF'] ?><p>
            <p>email du fournisseur: <?= $produit['emailF'] ?><p>
            <br>
    </div>
    <?php endforeach ?>
</div>

    <h2 class="h2form" >Passer une commande</h2>
    <label class="h2form"><strong> <?= $verifErreur[0] ?></strong></label>
    <form class="form" action="/controller/Router.php" method="post">
        <label>Id du produit</label>
        <input type="text" name="idProduit" required="required"/>
        <label>Titre</label>
        <input type="text"  pattern="[^\s]+" title="Veuillez utiliser des underscores à la place des espaces." name="titreAlbum" required="required"/>
        <label>Quantite</label>
        <input type="text"  pattern='[0-9]*' name="qte" required="required"/>
        <input type="hidden" name="action" value="passerCommande">
        <button type="submit">Valider</button>
    </form>

    <h2 class="h2form">Changer de fournisseur</h2>
    <label class="h2form"><strong> <?= $verifErreur[1] ?></strong></label>
    <form class="form" action="/controller/Router.php" method="post">
        <label>Id du produit</label>
        <input type="text" name="idProduit" required="required"/>
        <label>Titre</label>
        <input type="text"  pattern="[^\s]+" title="Veuillez utiliser des underscores à la place des espaces." name="titreAlbum" required="required"/>
        <label>Fournisseur</label>
        <input type="text"  pattern="[^\s]+" title="Veuillez utiliser des underscores à la place des espaces." pattern="[^\s]+" title="Ne peut pas contenir d'espace" name="nomF" required="required"/>
        <label>Email Fournisseur</label>
        <input type="text" name="emailF" required="required"/>
        <input type="hidden" name="action" value="updateFournisseur">
        <button type="submit">Valider</button>
    </form>
