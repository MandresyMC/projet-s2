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
            LEFT JOIN PS2_emprunt e ON o.id_objet = e.id_objet AND e.date_retour IS NULL
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

    function search($dept, $emp, $ageMax, $ageMin, $page) {
        $total_rows = count_rows($dept, $emp, $ageMax, $ageMin);
        $results_per_page = 20;
        $total_pages = ceil($total_rows / $results_per_page);

        $page = max(1, min($page, $total_pages));
        $debut = ($page - 1) * $results_per_page;
        
        $sql = "SELECT * 
        FROM employees e
        JOIN dept_emp p ON e.emp_no=p.emp_no
        JOIN departments d ON d.dept_no=p.dept_no
        WHERE 1=1";

        if($dept != NULL) {
            $sql .= " AND (d.dept_name LIKE '%".$dept."%' OR d.dept_no LIKE '%".$dept."%')";
        }
        if($emp != NULL) {
            $sql .= " AND e.first_name LIKE '%".$emp."%'";
        }
        if($ageMax == NULL) $ageMax = 100;
        if($ageMin == NULL) $ageMin = 0;
        $sql .= " AND (YEAR(CURDATE()) - YEAR(e.birth_date) BETWEEN $ageMin AND $ageMax)";
        $debut = ($page - 1) * 20;
        $sql .= " LIMIT ".$debut.", 20";
        
        $news_req = mysqli_query(dbconnect(), $sql);
        $result = array();
        while ($news = mysqli_fetch_assoc($news_req)) {
            $result[] = $news;
        }
        mysqli_free_result($news_req);
        return $result;
    }

    function count_rows($dept, $emp, $ageMax, $ageMin) {
        $sql = "SELECT * 
        FROM employees e
        JOIN dept_emp p ON e.emp_no=p.emp_no
        JOIN departments d ON d.dept_no=p.dept_no
        WHERE 1=1";

        if($dept != NULL) {
            $sql .= " AND (d.dept_name LIKE '%".$dept."%' OR d.dept_no LIKE '%".$dept."%')";
        }
        if($emp != NULL) {
            $sql .= " AND e.first_name LIKE '%".$emp."%'";
        }
        if($ageMax == NULL) $ageMax = 100;
        if($ageMin == NULL) $ageMin = 0;
        $sql .= " AND (YEAR(CURDATE()) - YEAR(e.birth_date) BETWEEN $ageMin AND $ageMax)";
        
        $news_req = mysqli_query(dbconnect(), $sql);
        $result = array();
        while ($news = mysqli_fetch_assoc($news_req)) {
            $result[] = $news;
        }
        mysqli_free_result($news_req);

        $total = count($result);
        return $total;
    }

?>