<?php
    require("../inc/fonction.php");

    $categorie = $_GET['categorie'];
    $nom_objet = $_GET['nom_objet'];

    $results = search($categorie, $nom_objet);
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
        <h2>Résultats du recharche</h2>
        <div class="container">
            <div class="row">
            <?php foreach($results as $result) { ?>
                <div class="col-md-3">
                    <div class="card mt-3">
                        <img src="../assets/<?= $result['nom_image'] ?>" class="card-img-top" alt="<?= $result['nom_image'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?=  $result['nom_objet'] ?></h5>
                            <p class="card-text text-secondary"><?= $result['nom'] ?></p>
                            <hr>
                            <h5 class="text-dark"> <?= $result['date_retour'] ?></h5>
                        </div>
                        <div class="position-absolute top-0 end-0 p-2">
                            <button type="button" class="btn btn-danger"><?= $result['nom_categorie']  ?></button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <a href="accueil.php">Retour</a>
    </body>
</html>