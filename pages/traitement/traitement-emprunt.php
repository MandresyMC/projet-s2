<?php
require("../inc/fonction.php");

session_start();
$id_membre = $_SESSION['id_membre']; 

$id_objet = $_POST['id_objet'];
$delai = (int)$_POST['delai'];

$date_emprunt = date('Y-m-d');
$date_retour = date('Y-m-d', strtotime("+$delai days"));

emprunter($id_objet, $id_membre, $date_emprunt, $date_retour);


header("Location: ../pages/accueil.php");
exit();
?>