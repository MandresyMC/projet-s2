<?php
    require("connexion.php");
    
    function to_log($email, $mdp){
        $sql = "SELECT * FROM PS2_membre WHERE email = '%s' and mdp = '%s'";
        $sql = sprintf($sql, $email, $mdp);
        echo $sql;
        $result = mysqli_query(dbconnect(), $sql);

        return mysqli_num_rows($result);
    }

    function inscrire($nom, $date_de_naissance, $genre, $email, $ville, $mdp, $image_profil) {
        $sql = "INSERT INTO PS2_membre (nom, date_de_naissance, genre, email, ville, mdp, image_profil)
                VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')";
        $sql = sprintf($sql, $nom, $date_de_naissance, $genre, $email, $ville, $mdp, $image_profil);

        echo $sql;
        $result = mysqli_query(dbconnect(), $sql);

     
    }

    function getObjects($filtre) {
        $sql = "
            SELECT 
                o.*, 
                i.nom_image, 
                e.date_retour,
                m.nom,
                c.nom_categorie
            FROM PS2_objet o
            LEFT JOIN PS2_images_objet i ON o.id_objet = i.id_objet
            LEFT JOIN PS2_emprunt e ON o.id_objet = e.id_objet
            LEFT JOIN PS2_membre m ON o.id_membre = m.id_membre
            LEFT JOIN PS2_categorie_objet c ON o.id_categorie = c.id_categorie
            WHERE 1=1
        ";

        if($filtre != NULL) {
            $sql .= " AND nom_categorie = '".$filtre."'";
        }

        $result = mysqli_query(dbconnect(), $sql);

        $objets = [];
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $objets[] = $row;
            }
        }

        return $objets;
    }

    function getCategories() {
        $sql = "SELECT * FROM PS2_categorie_objet";
        $result = mysqli_query(dbconnect(), $sql);

        $categories = [];

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $categories[] = $row;
            }
        }

        return $categories;
    }

    function emprunter($id_objet, $date_emprunt, $date_retour)
     {
    $sql = "INSERT INTO PS2_emprunt (id_objet, date_emprunt, date_retour)
            VALUES ('%s', '%s', '%s', '%s')";
    $sql = sprintf($sql, $id_objet, $id_membre, $date_emprunt, $date_retour);

    mysqli_query(dbconnect(), $sql);
    }


    function search($categorie, $nom_objet) {
       $sql = "SELECT 
                o.*, 
                i.nom_image, 
                e.date_retour,
                m.nom,
                c.nom_categorie
            FROM PS2_objet o
            LEFT JOIN PS2_images_objet i ON o.id_objet = i.id_objet
            LEFT JOIN PS2_emprunt e ON o.id_objet = e.id_objet AND e.date_retour IS NULL
            LEFT JOIN PS2_membre m ON o.id_membre = m.id_membre
            LEFT JOIN PS2_categorie_objet c ON o.id_categorie = c.id_categorie
            WHERE 1=1";

        if($categorie != NULL) {
            $sql .= " AND nom_categorie = '".$categorie."'";
        }
        if($nom_objet != NULL) {
            $sql .= " AND o.nom_objet LIKE '%".$nom_objet."%'";
        }
        
        $news_req = mysqli_query(dbconnect(), $sql);
        $result = array();
        while ($news = mysqli_fetch_assoc($news_req)) {
            $result[] = $news;
        }
        mysqli_free_result($news_req);
        return $result;
    }

    function ajustDate($date) {
        if($date != NULL) {
            return date('d/m/Y', strtotime($date));
        }
        return "Indisponible";
    }

    function get_id ($email, $mdp) {
        $sql = "SELECT * FROM PS2_membre WHERE email='%s' and mdp='%s'";
        $sql = sprintf($sql, $email, $mdp);
        echo $sql;
        $news_req = mysqli_query(dbconnect(), $sql);
        $id = mysqli_fetch_assoc($news_req);
        return $id['id_membre'];
    }

    function getFiche($id) {
        $sql = "SELECT * FROM PS2_membre m
        JOIN PS2_emprunt e ON m.id_membre=e.id_membre
        JOIN PS2_objet o ON o.id_objet=e.id_objet
        JOIN PS2_categorie_objet c ON c.id_categorie=o.id_categorie
        WHERE m.id_membre = %d";
        $sql = sprintf($sql, $id);
        $news_req = mysqli_query(dbconnect(), $sql);
        $result = array();
        while ($news = mysqli_fetch_assoc($news_req)) {
            $result[] = $news;
        }
        mysqli_free_result($news_req);
        return $result;
    }

    function getEmprunt($id_membre) {
        $sql = "SELECT * FROM PS2_emprunt e
        JOIN PS2_membre m ON m.id_membre=e.id_membre
        JOIN PS2_objet o ON o.id_objet=e.id_objet
        JOIN PS2_categorie_objet c ON c.id_categorie=o.id_categorie
        WHERE m.id_membre = %d";
        $sql = sprintf($sql, $id_membre);
        $news_req = mysqli_query(dbconnect(), $sql);
        $result = array();
        while ($news = mysqli_fetch_assoc($news_req)) {
            $result[] = $news;
        }
        mysqli_free_result($news_req);
        return $result;
    }
?>