<?php $title = "PageArtiste"; ?>

<?php foreach ($listProduit as $produit) : ?>
    <h2><?= $produit['titre'] ?></h2>
	<img src="/assets/img/album/<?= $produit['cover'] ?>" width=5% height=10% alt="cover">
    <form action="/controller/Router.php" method="post">
        <input type="hidden" name="genre" value=<?= $produit['genre']?>>
        <input type="hidden" name="action" value="pageGenre">
        <button type="submit"><?=str_replace("_", " ", $produit['genre'])?></button>
    </form>
    <p><?= $produit['anneeSortie'] ?></p>
	<p><?= $produit['prixPublic'] ?></p>
    <p><?= $produit['descriptif'] ?></p>
    <?php if(isset($_SESSION['email']) && $produit['qteStock']>0 ){ ?>
    <form action="/controller/Router.php" method="post">
        <input type="hidden" name="titreAlbum" value=<?= $produit['titre']?>>
        <input type="hidden" name="idProduit" value=<?= $produit['idProduit']?>>
        <input type="hidden" name="action" value="ajouterPanier">
        <button type="submit">Ajouter au panier</button>
    </form>
    <?php } ?>
<?php endforeach ?>