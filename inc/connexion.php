<?php
function dbconnect()
{
    static $connect = null;

    if ($connect === null) {
        $connect = mysqli_connect('localhost', 'root', '', 'projet_s2');
        //$connect = mysqli_connect('172.60.0.15', 'ETU004051', '9oAEIdGq', 'db_s2_ETU004051');

        if (!$connect) {
            die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
        }

        mysqli_set_charset($connect, 'utf8mb4');
    }

    return $connect;
}
?>