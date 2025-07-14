<?php
    require("../inc/fonction.php");

    if(isset($_GET['filtre'])) {
        $filtre = $_GET['filtre'];
    } else {
        $filtre = NULL;
    }
    $objets = getObjects($filtre);
    $categories = getCategories();
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <title>Document</title>
    </head>
    <body>
        <h1>Liste de tous les objet objets</h1>
        <form action="accueil.php">
            <label for="filtre">Filtrer</label>
            <select name="filtre" id="filtre">
                <option value="">Tous</option>
                <?php foreach($categories as $categorie) { ?>
                    <option value="<?= $categorie['nom_categorie'] ?>"><?= $categorie['nom_categorie'] ?></option>
                <?php } ?>
            </select>
            <input type="submit" value="Filtrer">
        </form>
        <h3>Search</h3>
        <form action="form-recherche.php" method="get">
            <select name="categorie" id="">
                <option value="">Categorie</option>
                <?php foreach($categories as $categorie) { ?>
                    <option value="<?= $categorie['nom_categorie'] ?>"><?= $categorie['nom_categorie'] ?></option>
                <?php } ?>
            </select>
            <input type="text" name="nom_objet">
            <button>Search</button>
        </form>
        <form action="../inc/deconnexion.php">
            <input type="submit" value="Déconnecter">
        </form>
        <br>
        <div class="container">
            <div class="row">
            <?php foreach($objets as $objet) { ?>
                <div class="col-md-3">
                    <div class="card mt-3">
                        <img src="../assets/<?= $objet['nom_image'] ?>" class="card-img-top" alt="<?= $objet['nom_image'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?=  $objet['nom_objet'] ?></h5>
                            <p class="card-text text-secondary"><?= $objet['nom'] ?></p>
                            <hr>
                            <h5 class=""> <?= $objet['date_retour'] ?></h5>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                            <button type="button" class="btn btn-danger"><?= $objet['nom_categorie']  ?></button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </body>
</html>