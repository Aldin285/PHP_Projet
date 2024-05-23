-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 27 Février 2014 à 15:27
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

---- --------------------------------------------------------

-- Base de données: `location`
--

-- --------------------------------------------------------
-- Structure de la table `typesclient`
--

CREATE TABLE IF NOT EXISTS type_client (
  id_type_client int(2) NOT NULL ,
  type_client varchar(256) NOT NULL,
  constraint PK_type_client primary key (id_type_client),
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- Contenu de la table `typesclient` -- 


INSERT INTO type_client (id_type_client, type_client) VALUES
(1, 'Particulier'),
(2, 'Entreprise'),
(3, 'Administration'),
(4, 'Association'),
(5, 'Longue duree');

-- --------------------------------------------------------
--
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS clients (
  id_client int(10) NOT NULL PRIMARY KEY,
  nom varchar(50) NOT NULL,
  prenom varchar(50) NOT NULL,
  adresse_mail varchar(256) NOT NULL,
  num_telephone int(10) NOT NULL,
  ville varchar(50) NOT NULL,
  id_type_client int(2) NOT NULL,
  CONSTRAINT fk_type_client FOREIGN  KEY (id_type_client)
  REFERENCES type_client(id_type_client)
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into clients values 
(1,'Henri','Freville','HenriFreville@gmail.com',07455815650,'Rennes',1);

-- --------------------------------------------------------
-- Structure de la table `location`
--

CREATE TABLE IF NOT EXISTS location (
  id_location int(9) NOT NULL PRIMARY KEY,
  id_option int(2) NOT NULL ,
  date_debut date NOT NULL,
  date_fin date NOT NULL,
  compteur_debut int(11) NOT NULL,
  compteur_fin int(11) NOT NULL,
  region varchar (50) NOT NULL,
  id_client int(10) NOT NULL,
  immatriculation varchar(16) NOT NULL,
  CONSTRAINT fk_clients FOREIGN KEY (id_client)
  REFERENCES clients(id_client),
  CONSTRAINT fk_voitures FOREIGN KEY (immatriculation)
  REFERENCES voitures(immatriculation),
  CONSTRAINT fk_option FOREIGN KEY (id_option)
  REFERENCES option(id_option) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

-- structure de la table 'facture' --

CREATE TABLE IF NOT EXISTS facture (
    id_facture int(10) NOT NULL Primary key,
    montant decimal(5,2) NOT NULL,
    date_facture date NOT NULL,
    id_location int(9) NOT NULL, 
    CONSTRAINT fk_location foreign key (id_location)
    REFERENCES location(id_location)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

-- structure de la table 'option'

CREATE TABLE IF NOT EXISTS option (

    id_option int(2) NOT NULL Primary key,
    option varchar(50) NOT NULL,
    prix decimal(5,2) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO option (id_option, option, prix) VALUES
(1, 'Assurance complementaire', '50.00'),
(2, 'Nettoyage', '75.00'),
(3, 'Complement carburant', '30.00'),
(4, 'Retour autre ville', '250.00'),
(5, 'Rabais dimanche', '-40.00');

-- --------------------------------------------------------

-- structure de la table 'voiture' --

CREATE TABLE IF NOT EXISTS voitures(
    immatriculation varchar(16) not null Primary key,
    num_proprio int(10) not null, 
    modele varchar(50) not null ,
    image varchar(250) not null,
    compteur decimal(10,2) not null,
    id_categorie varchar(2) not null,
    CONSTRAINT fk_categories FOREIGN KEY (id_categorie)
    REFERENCES categories(id_categorie)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO voitures (immatriculation,num_proprio,modele, image,compteur,id_categorie) VALUES
('123 ABC 456', 0758456587, 'Giulietta', 'alfa-romeo-giulietta.jpg', 2055, 'D'),
('215 QKX 284', 0754821453, 'S-Max', 'ford-smax.jpg', 27655, 'E'),
('234 ATV 765', 0645248657, 'Série 3', 'bmw-3.jpg', 5789, 'D'),
('238 SFG 387', 0758459968, 'Série 7', 'bmw-7.jpg', 19867, 'F'),
('241 GST 356', 0758452122, 'Polo', 'vw-polo.jpg', 21765, 'B'),
('293 LXU 428', 0545585741, 'Kuga', 'ford-kuga.jpg', 3682, 'G'),
('349 DES 974', 0745854752, '308', 'peugeot-308.jpg', 6548, 'B'),
('426 DEH 935', 0661337309, 'Cinquecento', 'fiat-500.jpg', 12546, 'A'),
('427 XHQ 765', 0745585152, 'Classe E', 'mercedes-e.jpg', 23768, 'F'),
('470 DKJ 639', 0748541222, '308 Break', 'peugeot-308-break.jpg', 28476, 'C'),
('537 QSD 276', 0658545598, 'Q50', 'infiniti-q50.jpg', 6548, 'G'),
('542 SQU 387', 0758695456, 'X5', 'bmw-x5.jpg', 128, 'V'),
('543 KDE 735', 0744863914, 'Astra Break', 'opel-astra-break.jpg', 43276, 'D'),
('634 DJH 724', 0747783791, 'For Two', 'smart-fortwo.jpg', 23102, 'A'),
('654 HDY 528', 0748569123, '308 Break', 'peugeot-308-break.jpg', 8545, 'C'),
('732 HFD 383', 0547854873, 'For Two', 'smart-fortwo.jpg', 6543, 'A'),
('734 SED 359', 0745851565, '308', 'peugeot-308.jpg', 12345, 'B'),
('744 HFS 296', 0745851565, 'Polo', 'vw-polo.jpg', 44346, 'B'),
('753 FSC 945', 0745851565, 'Octavia Break', 'skoda-octavia-break.jpg', 7654, 'D'),
('753 SUR 871', 0745851565, '308', 'peugeot-308.jpg', 21865, 'B'),
('754 GYH 749', 0745851565, 'X1', 'bmw-x1.jpg', 250, 'G'),
('765 HDW 347', 0745851565, 'Scirocco', 'vw-scirocco.jpg', 7534, 'D'),
('765 KJH 364', 0745851565, 'XF', 'jaguar-xf.jpg', 7652, 'V'),
('765 SRC 234', 0745851565, 'Série 3 Break', 'bmw-3-break.jpg', 9864, 'E'),
('853 DJY 284', 0745851565, 'Cooper', 'mini-cooper.jpg', 76443, 'C'),
('857 HDE 248', 0745851565, 'Panamera', 'porsche-panamera.jpg', 7538, 'V'),
('863 NBS 738', 0745851565, 'Cinquecento', 'fiat-500.jpg', 28765, 'A'),
('864 LQD 482', 0745851565, 'Jumpy 9 places', 'citroen-jumpy.jpg', 7646, 'E'),
('865 KSC 912', 0745851565, 'C-Max', 'ford-cmax.jpg', 27486, 'D'),
('873 MHF 487', 0745851565, 'Classe B', 'mercedes-b.jpg', 76534, 'E'),
('934 KDS 452', 0745851565, 'Passat Break', 'vw-passat-break.jpg', 12635, 'C'),
('985 FSZ 238', 0745851565, '3008', 'peugeot-3008.jpg', 8543, 'D');

-- ------------------------------------------------------ --

-- structure de la table 'categories' --

CREATE TABLE IF NOT EXISTS categories (

    id_categorie varchar(2)  NOT NULL PRIMARY KEY,
    categorie varchar(50) not null,
    prix_moyen decimal(5,2) not null,
    id_marque int(5) not null,
    CONSTRAINT fk_marque FOREIGN KEY (id_marque)
    REFERENCES marque(id_marque)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO categories (id_categorie, categorie, prix_moyen) VALUES
('A', 'Citadine', '60.00'),
('B', 'Economique', '72.00'),
('C', 'Compacte', '80.00'),
('D', 'Intermediaire', '95.00'),
('E', 'Berline', '120.00'),
('F', 'Grande berline', '150.00'),
('G', 'Sport, SUV', '230.00'),
('V', 'Luxe', '350.00');

-- ------------------------------------------------------ --

-- structure de la table 'marque' --

CREATE TABLE IF NOT EXISTS marque(

    id_marque int(5) NOT NULL PRIMARY KEY ,  
    nom_marque varchar(50) NOT NULL 
)ENGINE=InnoDB DEFAULT CHARSET=latin1

-- --------------------------------------------------------
