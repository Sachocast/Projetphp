<?php $title = "Accueil"; ?>

<?php foreach ($listProduit as $produit) : ?>
    <article>
        <h2><?= $produit['titre'] ?></h2>
		<img src="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/assets/img/album/<?= $produit['cover'] ?>" width=5% height=10% alt=<?= $produit[0]['cover'] ?>>
		<p><?= $produit['genre'] ?></p>
		<p><?= $produit['artiste'] ?></p>
		<p><?= $produit['anneeSortie'] ?></p>
		<p><?= $produit['prixPublic'] ?></p>
        <p><?= $produit['descriptif'] ?></p>
    </article>
<?php endforeach ?>