/*se connecter à mysql */
sudo mysql

/*quitter mysql */

exit

/*commandes de base */

SHOW DATABASES; /*La liste de bdd sur le serveurs*/
CREATE DATABASE livres_e2c; /*créer une bdd*/
USE livres_e2c /*Utiliser une bdd*/

/*gestion de compte */
CREATE USER 'livres_e2c_admin'@'localhost' IDENTIFIED BY "F9Jx9r5Pfg4Eb7";
GRANT ALL PRIVILEGES ON livres_e2c.* TO 'livres_e2c_admin'@'localhost';

/* se connecter à mysql avec un compte utilisateur spécifique */

mysql -h localhost -u livres_e2c_admin -p

/*Créer une table */
CREATE TABLE IF NOT EXISTS Users (
    id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    telephone CHAR(10),
    site VARCHAR(30) NOT NULL
)ENGINE=InnoDB;

/*Voir table et détail des tables*/
SHOW TABLES;
DESCRIBE Users;

/*Ajouter une colonne */ 

ALTER TABLE Users
ADD password VARCHAR(30) NOT NULL;

/*ajouter des données*/

INSERT INTO Users(prenom, nom, pseudo, password, email, telephone, site)
VALUES ('Olivier', 'Burcker', 'misterbear', 'azerty123456', 'o.burcker@e2c-grandlille.fr', '0320633080', 'Roubaix');

INSERT INTO Users(prenom, nom, pseudo, password, email, site)
VALUES  ('Sophie', 'Carpentier', 'SC', 'lapnumcestcool','sc@e2c.fr', 'Lille'),
        ('Amando', 'Ruiz', 'AR', 'vivementlePHP','ar@e2c.fr', 'Lille'),
        ('Adrien', 'Grandjean', 'Neuromancer','W1ll1amG1bson','ag@e2c.fr', 'Lille');



/*Lire toutes les données d'une table */

SELECT * FROM Users;
SELECT prenom, nom, email FROM Users;
SELECT prenom, nom, email FROM Users ORDER BY prenom ASC;
SELECT prenom, nom, email FROM Users ORDER BY email DESC;
SELECT pseudo, password FROM Users WHERE pseudo='Neuromancer';
SELECT pseudo, password FROM Users WHERE pseudo='Bisounours';
SELECT nom, prenom, pseudo FROM Users WHERE site='Lille';

/*Gestion des sites */

CREATE TABLE IF NOT EXISTS Sites(
    id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(20) NOT NULL
)ENGINE=InnoDB;

INSERT INTO Sites (name)
VALUES ('Lille'), ('Roubaix'), ('Armentières'), ('Saint Omer');

SELECT * FROM Sites;

/*premiere relation*/

ALTER TABLE Users
ADD site_id TINYINT UNSIGNED NOT NULL;

UPDATE Users SET site_id=1;
SELECT * FROM Users;


ALTER TABLE Users
ADD CONSTRAINT fk_sites 
    FOREIGN KEY (site_id)
    REFERENCES Sites(id);

Update Users SET site_id = 1 WHERE site="Lille";
Update Users SET site_id = 2 WHERE site="Roubaix";
Update Users SET site_id = 3 WHERE site="Armentières";
Update Users SET site_id = 4 WHERE site="Saint Omer";

Update Users SET site_id = 5;

ALTER TABLE Users
DROP site;

/* Jointure */

SELECT Users.pseudo, Users.email, Sites.name FROM  Users INNER JOIN Sites ON Users.site_id = Sites.id;


/* Les livres */

CREATE TABLE IF NOT EXISTS Genres (
    id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS Livres (
    id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    auteur VARCHAR(255) NOT NULL DEFAULT "Inconnu",
    genre_id TINYINT UNSIGNED NOT NULL DEFAULT 1,
    synopsis TEXT,
    date_of_edition CHAR(4) NOT NULL DEFAULT '-NC-',
    pages SMALLINT,
    site_id TINYINT UNSIGNED NOT NULL,
    CONSTRAINT fk_genre
        FOREIGN KEY (genre_id)
        REFERENCES Genres(id),
    CONSTRAINT fk_sites_book
        FOREIGN KEY (site_id)
        REFERENCES Sites(id)
)ENGINE=InnoDB;

ALTER TABLE Livres
    ADD COLUMN user_id SMALLINT UNSIGNED;

ALTER TABLE Livres
    ADD CONSTRAINT fk_livres_user
    FOREIGN KEY (user_id)
    REFERENCES Users(id);

/*Les jointures*/

SELECT titre, user_id FROM Livres;

SELECT Livres.titre, Users.pseudo FROM Livres 
    INNER JOIN Users ON Livres.user_id = Users.id;

SELECT Livres.titre, Users.pseudo FROM Livres 
    LEFT JOIN Users ON Livres.user_id = Users.id;

SELECT Livres.titre, Users.pseudo FROM Livres 
    RIGHT JOIN Users ON Livres.user_id = Users.id;

SELECT Livres.titre, Genres.name, Users.pseudo FROM Livres 
    INNER JOIN Users ON Livres.user_id = Users.id
    INNER JOIN Genres ON Livres.genre_id = Genres.id;

CREATE VIEW livres_vw AS (SELECT Livres.titre, Livres.auteur, Genres.name AS genre, Livres.date_of_edition AS date, Livres.pages, Sites.name AS site, Users.pseudo, Livres.id, Livres.genre_id, Livres.site_id, user_id FROM Livres
LEFT JOIN Genres ON Livres.genre_id = Genres.id
LEFT JOIN Sites ON Livres.site_id = Sites.id
LEFT JOIN Users ON Livres.user_id = Users.id);

/*Recherche */

SELECT * FROM livres_vw WHERE pages <= 100 ORDER BY pages ASC; 

/* Relation plusieurs à plusieurs - Commentaires */

CREATE TABLE IF NOT EXISTS Comments (
    comment TEXT NOT NULL,
    user_id SMALLINT UNSIGNED NOT NULL,
    livre_id SMALLINT UNSIGNED NOT NULL,
    PRIMARY KEY (user_id, livre_id),
    CONSTRAINT fk_comment_user
        FOREIGN KEY (user_id)
        REFERENCES Users(id),
    CONSTRAINT fk_comment_livre
        FOREIGN KEY (livre_id)
        REFERENCES Livres(id)
)ENGINE=InnoDB;

SELECT Livres.titre, Users.pseudo, Comments.comment FROM Livres
    INNER JOIN Comments ON Livres.id = Comments.livre_id
    INNER JOIN Users ON Comments.user_id = Users.id
    WHERE Livres.id = 35;