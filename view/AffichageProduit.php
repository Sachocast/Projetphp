<?php $title = "AffichageProduit"; ?>
 
<img src="/assets/img/album/<?= $ap[0]['cover'] ?>" alt=<?= $ap[0]['cover'] ?>>
<br>
<label>Id du produit: <?= $ap[0]['idProduit'] ?></label>
<br>
<label>Titre: <?= $ap[0]['titre'] ?></label>
<br>
<label>Artiste: <?= $ap[0]['artiste'] ?></label>
<br>
<label>Genre :<?= $ap[0]['genre'] ?></label>
<br>
<label>Annee de sortie: <?= $ap[0]['anneeSortie'] ?></label>
<br>
<label>Prix public: <?= $ap[0]['prixPublic'] ?></label>
<br>
<label>Prix achat: <?= $ap[0]['prixAchat'] ?></label>
<br>
<label><?= $ap[0]['descriptif'] ?></label>
