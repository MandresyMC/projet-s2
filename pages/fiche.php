<?php
    require("../inc/fonction.php");
    session_start();

    $id_membre = $_SESSION['id_membre'];
    $fiche = getFiche($id_membre);
    $emprunts = getEmprunt($id_membre);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fiche</title>
    </head>
    <body>
        <img src="../pdp/profile.png" alt="<?= $fiche[0]['image_profil'] ?>" width="100px">
        <h2><?= $fiche[0]['nom'] ?></h2>
        <table border=1>
            <tr>
                <th>Objet</th>
                <th>Categorie</th>
                <th>Date emprunt</th>
                <th></th>
            </tr>
            <?php foreach($emprunts as $emprunt) { ?>
                <tr>
                    <td><?= $emprunt['nom_objet'] ?></td>
                    <td><?= $emprunt['nom_categorie'] ?></td>
                    <td><?= $emprunt['date_emprunt'] ?></td>
                    <td>
                        <form action="retour.php">
                            <input type="submit" class="btn btn-primary" value="Retour">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <br>
        <a href="accueil.php"><-Retour</a>
    </body>
</html>