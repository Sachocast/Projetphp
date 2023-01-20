<?php $title = "Compta"; ?>

<h1>Compta</h1>
<?php if(!empty($comptaAnnee)) { ?>
<label><strong><?= $comptaAnnee[0]['annee'] ?></strong></label>
<label><strong><?= $comptaAnnee[0]['chiffreAffaire'] ?></strong></label>
<label><strong><?= $comptaAnnee[0]['debit'] ?></strong></label>
<?php } ?>

<h1>Credit</h1>
<?php if(!empty($credit)){ foreach($credit as $c): ?>
    <p><?= $c['idProduit'] ?></p>
    <p><?= $c['titre'] ?></p>
    <p><?= $c['prixDuProduit'] ?></p>
    <p><?= $c['qte'] ?></p>
    <p><?= $c['annee'] ?></p>
<?php endforeach; }?>

<h1>Debit</h1>
<?php if(!empty($debit)){ foreach($debit as $d): ?>
    <p><?= $d['idProduit'] ?></p>
    <p><?= $d['titre'] ?></p>
    <p><?= $d['prixAchat'] ?></p>
    <p><?= $d['qte'] ?></p>
    <p><?= $d['annee'] ?></p>
<?php endforeach; }?>