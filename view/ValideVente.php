<?php $title = "VV"; ?>

<?php foreach ($facture as $info) : ?>
    <p><?= $info['dateCreation'] ?></p>
    <p><?= $info['emailClient'] ?></p>
    <p><?= $info['nomClient'] ?></p>
    <?php $i=0; foreach ($listeProduit as $produit) : ?>
        <p><?= $infoProduit[$i][0]['titre'] ?></p>
        <p><?= $produit['qte'] ?></p>
        <p><?= $produit['prixDuProduit'] ?></p>
    <?php $i++; endforeach ?>
    <p><?= $info['prix'] ?></p>
<?php endforeach ?>
<form action="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/controller/Router.php" method="post">
    <input type="hidden" name="action" value="paiement">
    <button type="submit">valider</button>
</form>