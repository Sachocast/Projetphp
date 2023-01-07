<?php
$pageTitle = "Site de vente d'albums de musique";
$pageNav = "Nos albums";
$pageNavLink = "#";
$products = array(
	array(
		"name" => "Que de l'amour",
		"description" => "Informations sur l'album",
		"price" => 15,
        "artist" => "Par Ghost Killer Track",
		"image" => "../assets/img/que_de_l_amour.jpg"
	),
	array(
		"name" => "Coeur Blanc",
		"description" => "Informations sur l'album",
        "price" => 20,
        "artist" => "Par Jul",
        "image" => "../assets/img/Coeur_blanc.jpg"
	),
	array(
		"name" => "Into The Dark",
		"description" => "Informations sur l'album",
        "price" => 18,
        "artist" => "Par Menace Santana",
		"image" => "../assets/img/Into_the_dark.jpg"
	)
);
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $pageTitle; ?></title>
</head>
<body>
	<header>
		<h1>Bienvenue sur notre site de vente d'albums de musique</h1>
		<nav>
			<ul>
				<li><a href="#">Accueil</a></li>
				<li><a href="<?php echo $pageNavLink; ?>"><?php echo $pageNav; ?></a></li>
				<li><a href="#">Notre boutique</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<h2>Nos derniers albums</h2>
		<div class="products">
			<?php foreach($products as $product): ?>
			<div class="product">
				<img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
				<h3><?php echo $product['name']; ?></h3>
				<p><?php echo $product['artist']; ?></p>
                <p><?php echo $product['description']; ?></p>
				<p>Prix : <?php echo $product['price']; ?>€</p>
				<button>Ajouter au panier</button>
			</div>
			<?php endforeach; ?>
		</div>
	</main>
	<footer>
		<p>Copyright 2023 - Tous droits réservés</p>
	</footer>
</body>
</html>