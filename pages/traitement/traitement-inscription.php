<?php
    require("../../inc/fonction.php");
    session_start();

        $nom = htmlspecialchars(trim($_POST['nom']));
        $date_naissance = $_POST['date_de_naissance'];
        $genre = htmlspecialchars(trim($_POST['genre']));
        $email = htmlspecialchars(trim($_POST['email']));
        $ville = htmlspecialchars(trim($_POST['ville']));
        $mdp = htmlspecialchars(trim($_POST['mdp']));

    inscrire($nom, $date_de_naissance, $genre, $email, $ville, $mdp, $image_profil);
    header('Location: ../pages/accueil.php');

?>