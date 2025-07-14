<?php
require("../inc/fonction.php");

$id_objet = $_GET['num'];
$db = dbconnect();

$sql = "SELECT o.*, m.nom AS nom_membre, i.nom_image, c.nom_categorie 
        FROM PS2_objet o
        LEFT JOIN PS2_membre m ON o.id_membre = m.id_membre
        LEFT JOIN PS2_images_objet i ON o.id_objet = i.id_objet
        LEFT JOIN PS2_categorie_objet c ON o.id_categorie = c.id_categorie
        WHERE o.id_objet = $id_objet";

$result = mysqli_query($db, $sql);
$objet = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Emprunter l'objet</title>
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="card mx-auto shadow" style="max-width: 500px;">
      <img src="../assets/<?= $objet['nom_image'] ?>" class="card-img-top">
      <div class="card-body">
        <h4 class="card-title"><?= $objet['nom_objet'] ?></h4>
        <p>Propriétaire : <?= $objet['nom_membre'] ?></p>
        <hr>
        <form action="traitement/traitement-emprunt.php" method="post">
          <input type="hidden" name="id_objet" value="<?= $objet['id_objet'] ?>">
          <div class="mb-3">
            <label for="delai" class="form-label">Choisis un délai (en jours) :</label>
            <select class="form-select" name="delai" id="delai" required>
              <option value="1">1 jour</option>
              <option value="3">3 jours</option>
              <option value="7">7 jours</option>
              <option value="14">14 jours</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary w-100">Emprunter</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
