<?php $title = "Panier"; ?>


<?php 
if(isset($_SESSION['panier'])){
    $count = [];
    $val = [];
    for($j = 0; $j <count($panier); $j++) { 
        $cpt =0; $verify = false;
        foreach($val as $k){
            if($panier[$j][0]['idProduit']==$k) $verify = true;
        }
        if(!$verify){
            for($index = 0; $index < count($panier); $index++) 
            {
                if($panier[$j][0]['idProduit'] == $panier[$index][0]['idProduit'])
                {
                    $cpt++;
                }
            }
            array_push($count, $cpt);
            array_push($val, $panier[$j][0]['idProduit']);
        }
    }
    $unique_items = array_unique($panier, SORT_REGULAR); ?>

    <form action="/controller/Router.php" method="post">
    <?php     $j=0;
        foreach ($unique_items as $produit) : ?>
            <div class="affichagePanier">
                <img src="/assets/img/album/<?= $produit[0]['cover'] ?>" width=5% height=10% alt=<?= $produit[0]['cover'] ?>>
                <div class="test">
                    <h2><?= str_replace("_", " ", $produit[0]['titre']) ?></h2>
                    <p><?= str_replace("_", " ", $produit[0]['artiste']) ?></p>
                    <p>Prix du produit : <?= str_replace("_", " ", $produit[0]['prixPublic']) ?> €</p>
                    <p>Quantité : <?= $count[$j]; ?></p>
                </div>
            </div>
    <?php $j++; endforeach ?>
        <br>    
        <div id="payerPanier">
            <input type="hidden" name="action" value="validerPanier">
            <button type="submit">Payer</button>
        </div>
    </form>
<?php } ?>
<div id="viderPanier">
    <form action="/controller/Router.php" method="post">
        <input type="hidden" name="action" value="viderPanier">
        <button type="submit">Vider le panier</button>
    </form>
</div>

