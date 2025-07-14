-- 1. Création des tables
CREATE TABLE PS2_membre (
    id_membre INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    date_de_naissance DATE,
    genre ENUM('M', 'F'),
    email VARCHAR(100) UNIQUE,
    ville VARCHAR(100),
    mdp VARCHAR(255),
    image_profil VARCHAR(255)
);

CREATE TABLE PS2_categorie_objet (
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(100) UNIQUE
);

CREATE TABLE PS2_objet (
    id_objet INT AUTO_INCREMENT PRIMARY KEY,
    nom_objet VARCHAR(100),
    id_categorie INT,
    id_membre INT,
    FOREIGN KEY (id_categorie) REFERENCES PS2_categorie_objet(id_categorie),
    FOREIGN KEY (id_membre) REFERENCES PS2_membre(id_membre)
);

CREATE TABLE PS2_images_objet (
    id_image INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    nom_image VARCHAR(255),
    FOREIGN KEY (id_objet) REFERENCES PS2_objet(id_objet)
);

CREATE TABLE PS2_emprunt (
    id_emprunt INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    id_membre INT,
    date_emprunt DATE,
    date_retour DATE,
    FOREIGN KEY (id_objet) REFERENCES PS2_objet(id_objet),
    FOREIGN KEY (id_membre) REFERENCES PS2_membre(id_membre)
);

-- 2. Insertion des catégories
INSERT INTO PS2_categorie_objet (nom_categorie) VALUES
('Esthétique'), ('Bricolage'), ('Mécanique'), ('Cuisine');

-- 3. Insertion des membres
INSERT INTO PS2_membre (nom, date_de_naissance, genre, email, ville, mdp, image_profil) VALUES
('Sarah Andriamanana', '1992-06-12', 'F', 'sarah@gmail.com', 'Antananarivo', 'sarah123', 'profile.png'),
('Lova Rabe', '1987-03-25', 'M', 'lova.rabe@yahoo.com', 'Toamasina', 'lova87', 'profile.png'),
('Miora Rakoto', '1995-10-04', 'F', 'miora@hotmail.com', 'Fianarantsoa', 'miora95', 'profile.png'),
('Tina Razanaka', '1990-01-17', 'M', 'tina@gmail.com', 'Mahajanga', 'tina90', 'profile.png');

-- 4. Insertion des objets (40 objets = 10 par membre)
INSERT INTO PS2_objet (nom_objet, id_categorie, id_membre) VALUES
-- Sarah (membre 1)
('Sèche-cheveux Philips', 1, 1),
('Trousse de maquillage', 1, 1),
('Fer à lisser Remington', 1, 1),
('Perceuse Bosch', 2, 1),
('Marteau Stanley', 2, 1),
('Clé à molette', 3, 1),
('Pompe à vélo', 3, 1),
('Mixeur Moulinex', 4, 1),
('Casserole Tefal', 4, 1),
('Blender Electrolux', 4, 1),

-- Lova (membre 2)
('Tondeuse cheveux', 1, 2),
('Brosse lissante', 1, 2),
('Tournevis électrique', 2, 2),
('Niveau laser', 2, 2),
('Compresseur portatif', 3, 2),
('Clé dynamométrique', 3, 2),
('Robot pâtissier', 4, 2),
('Grille-pain inox', 4, 2),
('Micro-ondes Samsung', 4, 2),
('Machine à café', 4, 2),

-- Miora (membre 3)
('Coffret vernis', 1, 3),
('Épilateur Braun', 1, 3),
('Pinceau maquillage', 1, 3),
('Scie sauteuse', 2, 3),
('Ponceuse orbitale', 2, 3),
('Kit réparation auto', 3, 3),
('Cric hydraulique', 3, 3),
('Plaque de cuisson', 4, 3),
('Cocotte-minute', 4, 3),
('Balance de cuisine', 4, 3),

-- Tina (membre 4)
('Kit coiffure', 1, 4),
('Miroir lumineux', 1, 4),
('Tournevis plat', 2, 4),
('Scie circulaire', 2, 4),
('Boîte à outils', 3, 4),
('Caisse à outils Facom', 3, 4),
('Grill multifonction', 4, 4),
('Batteur électrique', 4, 4),
('Friteuse électrique', 4, 4),
('Appareil à raclette', 4, 4);

-- 5. Insertion des images (1 par objet)
INSERT INTO PS2_images_objet (id_objet, nom_image) VALUES
(1, 'seche_cheveux.jpg'), (2, 'seche_cheveux.jpg'), (3, 'seche_cheveux.jpg'), (4, 'seche_cheveux.jpg'), (5, 'seche_cheveux.jpg'),
(6, 'seche_cheveux.jpg'), (7, 'seche_cheveux.jpg'), (8, 'seche_cheveux.jpg'), (9, 'seche_cheveux.jpg'), (10, 'seche_cheveux.jpg'),
(11, 'seche_cheveux.jpg'), (12, 'seche_cheveux.jpg'), (13, 'seche_cheveux.jpg'), (14, 'seche_cheveux.jpg'), (15, 'seche_cheveux.jpg'),
(16, 'seche_cheveux.jpg'), (17, 'seche_cheveux.jpg'), (18, 'seche_cheveux.jpg'), (19, 'seche_cheveux.jpg'), (20, 'seche_cheveux.jpg'),
(21, 'seche_cheveux.jpg'), (22, 'seche_cheveux.jpg'), (23, 'seche_cheveux.jpg'), (24, 'seche_cheveux.jpg'), (25, 'seche_cheveux.jpg'),
(26, 'seche_cheveux.jpg'), (27, 'seche_cheveux.jpg'), (28, 'seche_cheveux.jpg'), (29, 'seche_cheveux.jpg'), (30, 'seche_cheveux.jpg'),
(31, 'seche_cheveux.jpg'), (32, 'seche_cheveux.jpg'), (33, 'seche_cheveux.jpg'), (34, 'seche_cheveux.jpg'),
(35, 'seche_cheveux.jpg'), (36, 'seche_cheveux.jpg'), (37, 'seche_cheveux.jpg'), (38, 'seche_cheveux.jpg'), (39, 'seche_cheveux.jpg'), (40, 'seche_cheveux.jpg');

-- 6. Insertion de 10 emprunts
INSERT INTO PS2_emprunt (id_objet, id_membre, date_emprunt, date_retour) VALUES
(4, 2, '2025-07-01', '2025-07-03'),
(17, 1, '2025-07-02', '2025-07-04'),
(26, 4, '2025-07-03', '2025-07-06'),
(31, 3, '2025-07-04', '2025-07-08'),
(8, 3, '2025-07-05', '2025-07-09'),
(15, 1, '2025-07-06', '2025-07-10'),
(12, 4, '2025-07-07', '2025-07-11'),
(30, 2, '2025-07-08', '2025-07-12'),
(20, 3, '2025-07-09', '2025-07-13'),
(5, 4, '2025-07-10', '2025-07-14');
(1, 2, '2025-07-10', '2025-07-24');

CREATE TABLE PS2_retour (
    id_membre INT,
    choix INT
);