<?php $title = "PageArtiste"; ?>

<?php foreach ($listProduit as $produit) : ?>
    <div class="Accueil">
        <img src="/assets/img/album/<?= $produit['cover'] ?>" width=20% height=20% alt="cover">
        <div class="test">
            <h2><?=str_replace("_", " ", $produit['titre'])?></h2>
            <form action="/controller/Router.php" method="post">
                <input type="hidden" name="genre" value=<?= $produit['genre']?>>
                <input type="hidden" name="action" value="pageGenre">
                <button type="submit"><?=str_replace("_", " ", $produit['genre'])?></button>
            </form>
            <p>Annee de sortie: <?= $produit['anneeSortie'] ?></p>
            <p>Prix: <?= $produit['prixPublic']?> € </p>
            <p><?= $produit['descriptif'] ?></p>
        </div>
    </div>
    <?php if(isset($_SESSION['email']) && $produit['qteStock']>0 ){ ?>
    <form action="/controller/Router.php" method="post">
        <input type="hidden" name="titreAlbum" value=<?= $produit['titre']?>>
        <input type="hidden" name="idProduit" value=<?= $produit['idProduit']?>>
        <input type="hidden" name="action" value="ajouterPanier">
        <button class="panier"type="submit">Ajouter au panier</button>
    </form>
    <?php } ?>
<?php endforeach ?>