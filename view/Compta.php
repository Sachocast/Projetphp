<?php $title = "Compta"; ?>

<h1 class="h2form">Compta</h1>
<?php if(!empty($comptaAnnee)) { ?>
<div id="compta">
    <label><strong>Annee <?= $comptaAnnee[0]['annee'] ?></strong></label>
    <label><strong>Credit <?= $comptaAnnee[0]['chiffreAffaire'] ?></strong></label>
    <label><strong>Debit <?= $comptaAnnee[0]['debit'] ?></strong></label>
</div>
<?php } ?>

<h1 class="h2form">Credit</h1>
<table>
  <tr>
    <th>IdProduit</th>
    <th>Titre</th>
    <th>Prix du produit</th>
    <th>Quantité</th>
    <th>Annee</th>
  </tr>
  <?php if(!empty($credit)){ foreach($credit as $c): ?>
    <tr>
        <td><?= $c['idProduit'] ?></td>
        <td><?= $c['titre'] ?></td>
        <td><?= $c['prixDuProduit'] ?></td>
        <td><?= $c['qte'] ?></td>
        <td><?= $c['annee'] ?></td>
    </tr>
<?php endforeach; }?>
</table>

<h1 class="h2form">Debit</h1>
<table>
  <tr>
    <th>IdProduit</th>
    <th>Titre</th>
    <th>Prix du produit</th>
    <th>Quantité</th>
    <th>Annee</th>
  </tr>
  <?php if(!empty($debit)){ foreach($debit as $d): ?>
    <tr>
        <td><?= $d['idProduit'] ?></td>
        <td><?= $d['titre'] ?></td>
        <td><?= $d['prixAchat'] ?></td>
        <td><?= $d['qte'] ?></td>
        <td><?= $d['annee'] ?></td>
    </tr>
<?php endforeach; }?>
</table>