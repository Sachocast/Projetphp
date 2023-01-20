<?php $title = "Admin"; ?>

    <h2  class="h2form" >Rechercher un Produit</h2>
    <label  class="h2form"><strong><?= $admin[1] ?></strong></label>
    <form class="form" action="/controller/Router.php" method="post">
            <label>Titre</label>
            <input type="text"  pattern="[^\s]+" title="Veuillez utiliser des underscores à la place des espaces." name="titreAlbum"/>
            <label>Artiste</label>
            <input type="text"  pattern="[^\s]+" title="Veuillez utiliser des underscores à la place des espaces." name="artiste"/>
            <label>Genre</label>
            <input type="text"  pattern="[^\s]+" title="Veuillez utiliser des underscores à la place des espaces." name="genre"/>
            <label>Année de sortie</label>
            <input type="text" name="anneeSortie"/>
            <input type="hidden" name="action" value="rechercheProduit">
            <button type="submit">Valider</button>
    </form>

    <h2 class="h2form">Ajouter un Produit</h2>
    <label  class="h2form"><strong><?= $admin[0] ?></strong></label>
    <label  class="h2form"><strong>Pour le titre, l'artiste, et le genre</strong></label>
    <label  class="h2form"><strong>veuillez mettre des underscores à la place des espaces</strong></label>
    <form class="form" action="/controller/Router.php" method="post">
        <label>Titre</label>
        <input type="text" pattern="[^\s]+" title="Veuillez utiliser des underscores à la place des espaces." name="titreAlbum" required="required"/>
        <label>Artiste</label>
        <input type="text" pattern="[^\s]+" title="Veuillez utiliser des underscores à la place des espaces." name="artiste" required="required"/>
        <label>Genre</label>
        <input type="text" pattern="[^\s]+" title="Veuillez utiliser des underscores à la place des espaces." name="genre" required="required"/>
        <label>Année de sortie</label>
        <input type="text" pattern='[0-9]*'  name="anneeSortie"required="required"/>
        <label>Descriptif</label>
        <input type="text" pattern=".{0,100}" title="Maximum 100 characters" name="descriptif" required="required"/>
        <label>Cover</label>
        <input type="text" pattern="^.+\.jpg$" title="Veuillez utiliser l'extension .jpg à la fin de votre entrée." name="cover" required="required"/>
        <label>Prix achat</label>
        <input type="text" pattern='^\d*\.?\d+$'  name="prixAchat" required="required"/>
        <label>Prix public</label>
        <input type="text" pattern='^\d*\.?\d+$*'  name="prixPublic" required="required"/>
        <label>Fournisseur</label>
        <input type="text" pattern="[^\s]+" title="Ne peut pas contenir d'espace" name="nomF" required="required"/>
        <label>Email fournisseur</label>
        <input type="text" name="emailF" pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.[a-zA-Z.]{2,15}" required="required"/>
        <label>Stock</label>
        <input type="text" pattern='[0-9]*'  name="qteStock" required="required"/>
        <input type="hidden" name="action" value="ajoutProduit">
        <button type="submit">Valider</button>
    </form>

    <h2 class="h2form">Supprimer un Produit</h2>
    <label class="h2form"><strong><?= $admin[2] ?></strong></label>
    <form class="form"action="/controller/Router.php" method="post">
        <label>Id du produit</label>
        <input type="text" pattern='[0-9]*'  name="idProduit" required="required"/>
        <label>Titre</label>
        <input type="text" pattern="[^\s]+" title="Veuillez utiliser des underscores à la place des espaces." name="titreAlbum" required="required"/>
        <label>Artiste</label>
        <input type="text" name="artiste" required="required"/>
        <label>Genre</label>
        <input type="text" name="genre" required="required"/>
        <label>Année de sortie</label>
        <input type="text" pattern='[0-9]*'  name="anneeSortie" required="required"/>
        <input type="hidden" name="action" value="supprimerProduit">
        <button type="submit">Valider</button>
    </form>

<div id="redirigeStocks">
    <form action="/controller/Router.php" method="post">
        <input type="hidden" name="action" value="stocks">
        <button type="submit">Gerer les stocks</button>
    </form>
</div>
<div id="redirigeCompta">
    <form action="/controller/Router.php" method="post">
        <input type="hidden" name="action" value="compta">
        <button type="submit">Comptabilité</button>
    </form>
</div>