<?php $title = "VV"; ?>

<?php foreach ($facture as $info) : ?>
    <p><?= $info['dateCreation'] ?></p>
    <p><?= $info['emailClient'] ?></p>
    <p><?= $info['nomClient'] ?></p>
    <?php $i=0; foreach ($listeProduit as $produit) : if(isset($infoProduit[$i][0]['titre'])){ ?>
        <p><?= str_replace("_", " ", $infoProduit[$i][0]['titre']) ?></p>
        <p>Quantité : <?= $produit['qte'] ?></p>
        <p>Prix du produit :<?= $produit['prixDuProduit'] ?></p>
    <?php $i++; } endforeach ?>
    <p>Prix total HT : <?= $info['prix'] ?> €</p>
    <p>Prix total TTC : <?= $info['prix']*1.20 ?> €</p>
<?php endforeach ?>
<div id="validerPaiement">
    <form action="/controller/Router.php" method="post">
        <input type="hidden" name="action" value="paiement">
        <button type="submit">Valider</button>
    </form>
</div>