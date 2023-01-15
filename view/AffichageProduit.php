<?php $title = "AffichageProduit"; ?>
 
<img src="https://linserv-info-01.campus.unice.fr/~cs102126/R301/Projetphp/assets/img/album/<?= $ap[0]['cover'] ?>" alt=<?= $ap[0]['cover'] ?>>
<br>
<label><?= $ap[0]['idProduit'] ?></label>
<br>
<label><?= $ap[0]['titre'] ?></label>
<br>
<label><?= $ap[0]['artiste'] ?></label>
<br>
<label><?= $ap[0]['genre'] ?></label>
<br>
<label><?= $ap[0]['anneeSortie'] ?></label>
<br>
<label><?= $ap[0]['prixPublic'] ?></label>
<br>
<label><?= $ap[0]['prixAchat'] ?></label>
<br>
<label><?= $ap[0]['descriptif'] ?></label>
