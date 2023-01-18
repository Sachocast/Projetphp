<?php $title = "Accueil"; ?>

<?php foreach ($listProduit as $produit) : ?>
    <form action="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/controller/Router.php" method="post">
        <h2><?= $produit['titre'] ?></h2>
        <input type="hidden" name="titreAlbum" value=<?= $produit['titre']?>>
		<img src="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/assets/img/album/<?= $produit['cover'] ?>" width=5% height=10% alt=<?= $produit[0]['cover'] ?>>
		<p><?= $produit['genre'] ?></p>
		<p><?= $produit['artiste'] ?></p>
		<p><?= $produit['anneeSortie'] ?></p>
		<p><?= $produit['prixPublic'] ?></p>
        <p><?= $produit['descriptif'] ?></p>
        <input type="hidden" name="idProduit" value=<?= $produit['idProduit']?>>
        <input type="hidden" name="action" value="ajouterPanier">
        <?php if(isset($_SESSION['email'])){ ?>
            <button type="submit">Ajouter au panier</button>
        <?php } ?>
    </form>
<?php endforeach ?>
