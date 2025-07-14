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
        <link rel="stylesheet" href="../assets/css/bg.css">
        <title>Document</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="accueil.php">Filtrer par Categorie</a>
                
                <form class="d-flex me-auto ms-3" action="accueil.php" method="get">
                <select name="filtre" id="filtre" class="form-select me-2">
                    <option value="">Tous</option>
                    <?php foreach($categories as $categorie) { ?>
                    <option value="<?= $categorie['nom_categorie'] ?>"><?= $categorie['nom_categorie'] ?></option>
                    <?php } ?>
                </select>
                <button class="btn btn-outline-light" type="submit">Filtrer</button>
                </form>

                <form class="d-flex" action="../inc/deconnexion.php">
                <button type="submit" class="btn btn-outline-danger">Déconnecter</button>
                </form>
            </div>
        </nav>

        <div class="container mt-4">
            <h1 class="mb-4">Liste de tous les objets</h1>

            <div class="card p-3 mb-4 shadow-sm">
                <h3>Recherche</h3>
                <form action="form-recherche.php" method="get" class="row g-2">
                <div class="col-md-4">
                    <select name="categorie" class="form-select">
                    <option value=""></option>
                    <?php foreach($categories as $categorie) { ?>
                        <option value="<?= $categorie['nom_categorie'] ?>"><?= $categorie['nom_categorie'] ?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="col-md-5">
                    <input type="text" name="nom_objet" class="form-control" placeholder="Nom de l'objet">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
                </form>
            </div>

            <div class="row">
                <?php foreach($objets as $objet) { ?>
                <div class="col-md-3">
                    <div class="card mt-3 position-relative shadow-sm">
                    <img src="../assets/<?= $objet['nom_image'] ?>" class="card-img-top" alt="<?= $objet['nom_image'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?=  $objet['nom_objet'] ?></h5>
                        <p class="card-text text-secondary"><?= $objet['nom'] ?></p>
                        <hr>
                        <p class="text-light">Retour : <?= ajustDate($objet['date_retour']) ?></p>
                    </div>
                    <div class="position-absolute top-0 end-0 p-2">
                        <span class="badge bg-danger"><?= $objet['nom_categorie']  ?></span>
                    </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

    </body>
</html>