<?php
require("../inc/fonction.php");

$categorie = $_GET['categorie'];
$nom_objet = $_GET['nom_objet'];

$results = search($categorie, $nom_objet);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Résultats de recherche</title>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/recherche.css">
    </head>
    <body>
        <a href="accueil.php">← Retour à l'accueil</a>
        <h2>Résultats de la recherche</h2>
        <div class="container">
            <div class="row">
                <?php if (count($results) > 0) { ?>
                    <?php foreach($results as $result) { ?>
                        <div class="col-md-3">
                            <div class="card mt-3 position-relative">
                                <img src="../assets/<?= $result['nom_image'] ?>" class="card-img-top" alt="<?= $result['nom_image'] ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $result['nom_objet'] ?></h5>
                                    <p class="card-text text-secondary"><?= $result['nom'] ?></p>
                                    <hr>
                                    <h6 class="text-muted">Retour : <?= ajustDate($result['date_retour']) ?></h6>
                                </div>
                                <div class="position-absolute top-0 end-0 p-2">
                                    <span class="badge bg-danger"><?= $result['nom_categorie'] ?></span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <p class="text-center text-light">Aucun résultat trouvé.</p>
                <?php } ?>
            </div>
        </div>
    </body>
</html>
