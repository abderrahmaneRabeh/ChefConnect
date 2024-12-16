-- Création de la base de données

CREATE DATABASE chef_cuisinier
-- Création des tables

CREATE TABLE roles (
    id_role INT PRIMARY KEY AUTO_INCREMENT,
    role_name VARCHAR(255) NOT NULL,
)

CREATE TABLE utilisateurs (
    id_utilisateur INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_id INT NOT NULL,
    FOREIGN KEY (role_id) REFERENCES roles (id_role)
);

-- Création de la table menus
CREATE TABLE menus (
    id_menu INT PRIMARY KEY AUTO_INCREMENT,
    chef_id INT NOT NULL,
    titre_menu VARCHAR(255) NOT NULL,
    description_menu TEXT,
    FOREIGN KEY (chef_id) REFERENCES utilisateurs (id_utilisateur)
);

-- Création de la table reservations
CREATE TABLE reservations (
    id_reservation INT PRIMARY KEY AUTO_INCREMENT,
    utilisateur_id INT NOT NULL,
    menu_id INT NOT NULL,
    date_de_reservation DATE NOT NULL,
    time_de_reservation TIME NOT NULL,
    number_of_people INT NOT NULL,
    status ENUM(
        'en attente',
        'acceptée',
        'refusée'
    ) NOT NULL,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs (id_utilisateur),
    FOREIGN KEY (menu_id) REFERENCES menus (id_menu)
);

-- Création de la table dishes
CREATE TABLE plats (
    id_plat INT PRIMARY KEY AUTO_INCREMENT,
    menu_id INT NOT NULL,
    nom_de_plat VARCHAR(255) NOT NULL,
    description TEXT,
    img VARCHAR(255),
    FOREIGN KEY (menu_id) REFERENCES menus (id_menu)
);