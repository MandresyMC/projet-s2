<?php
    require("../../inc/fonction.php");
    session_start();

    $email = $_GET['email'];
    $mdp = $_GET['mdp'];
    $pdp = 'profile.png';
    $id_membre = get_id($email, $mdp);
    $_SESSION['id_membre'] = $id_membre;

    $row = to_log($email, $mdp);
    if($row === 0) {
        header('Location: ../index.php?erreur=1');
        exit;
    }

    header('Location: ../accueil.php');
    
?>
