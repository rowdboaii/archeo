/* Sujet : Projet de base de données pour des fouilles archéologiques.
 * Auteur : Xavier Mutt & Antoine Hars
 * Date : 16/09/2012
 */

/* Création de la database. */
CREATE DATABASE bdd_xavier owner jehu;

/* Création de la table Région. */
CREATE TABLE region
(
	nom VARCHAR(50) PRIMARY KEY,
	pays VARCHAR(50) NOT NULL
);

/* Création de la table Personne. */
CREATE TABLE personne
(
	nom VARCHAR(50),
	prenom VARCHAR(50),
	identifiant INTEGER PRIMARY KEY, -- Ajouter un calcul de l'identifiant unique.
	nationalite VARCHAR(50) NOT NULL,
	fonction VARCHAR(50) NOT NULL, -- Changer le VARCHAR en ENUM.
);

/* Création de la table Site. */
CREATE TABLE site
(
	nom VARCHAR(50) PRIMARY KEY,
	region VARCHAR(50) REFERENCES region(nom),
	position_nord FLOAT,
	position_est FLOAT,
	altitude FLOAT,
	trouve_par INTEGER REFERENCES personne(identifiant),
	fouille_par INTEGER REFERENCES personne(identifiant),
	type VARCHAR(50) NOT NULL, -- Changer le VARCHAR en ENUM.
	commentaire VARCHAR(500),
);

/* Création de la table Locus. */
CREATE TABLE locus
(
	nom VARCHAR(50) PRIMARY KEY,
	type VARCHAR(50) NOT NULL, -- Changer le VARCHAR en ENUM.
	site VARCHAR(50) REFERENCES site(nom),
	position_nord FLOAT,
	position_est FLOAT,
	altitude FLOAT,
	trouve_par INTEGER REFERENCES personne(identifiant),
	appartient_a INTEGER REFERENCES personne(identifiant)
);

/* Création de la table Article. */
CREATE TABLE article
(
	titre VARCHAR(100) PRIMARY KEY,
	auteur INTEGER REFERENCES personne(identifiant),
	mot_cle VARCHAR(200),
	annee DATE, -- Vérifier si le type est bon.
	revue VARCHAR(100) NOT NULL,
	langue VARCHAR(50) NOT NULL,
	sujet VARCHAR(50) NOT NULL -- Faire un trigger pour vérifier que le sujet est soit un site, soit une région ou soit une locus.
);

/* Création de la table collection. */
CREATE TABLE collection
(
	nom VARCHAR(50) PRIMARY KEY,
	proprietaire INTEGER REFERENCES personne(identifiant)
);

/* Création de la table Gisement. */
CREATE TABLE gisement
(
	identifiant INTEGER PRIMARY KEY, -- Peut être changer INTEGER en VARCHAR.
	region VARCHAR(50) REFERENCES region(nom),
	position_nord FLOAT,
	position_est FLOAT,
	altitude FLOAT,
	commentaire VARCHAR(200)
);

/* Création de la table Lieu. */
CREATE TABLE lieu
(
	nom VARCHAR(50) PRIMARY KEY,
	region VARCHAR(50) REFERENCES region(nom),
	position_nord FLOAT,
	position_est FLOAT,
	altitude FLOAT,
	commentaire VARCHAR(200)
);

/* Création de la table Prospection. */
CREATE TABLE prospection
(
	identifiant INTEGER PRIMARY KEY,
	date_prospection DATE,
	responsable INTEGER REFERENCES personne(identifiant)
);

/* Création de la table Objet. */
CREATE TABLE objet
(
	nom VARCHAR(50) PRIMARY KEY,
	poids FLOAT NOT NULL,
	longueur FLOAT NOT NULL,
	largeur FLOAT NOT NULL,
	hauteur FLOAT NOT NULL,
	locus varchar(50) REFERENCES locus(nom),
	nature VARCHAR(50) NOT NULL, -- Changer le VARCHAR en ENUM.
	fiche VARCHAR(50), -- Changer le VARCHAR pour avec des points 3D.
	brule BOOLEAN, -- Mettre par défaut à FALSE.
	periode DATE, -- Vérifier le type DATE.
	commentaire varchar(200),
	tamis BOOLEAN, -- Mettre par défaut à FALSE.
	trouve_par INTEGER REFERENCES personne(identifiant)
);

/* Création de la table Galet. */
CREATE TABLE galet
(
	nom VARCHAR(50) PRIMARY KEY,
	type VARCHAR(50) NOT NULL, -- Changer le VARCHAR en ENUM.
	objet VARCHAR(50) REFERENCES objet(nom)
);

/* Création de la table Charbon. */
CREATE TABLE charbon
(
	datation DATE NOT NULL,
	objet VARCHAR(50) REFERENCES objet(nom)
); -- Vérifier qu'il n'y ait pas besoin de clé primaire.

/* Création de la table Os. */
CREATE TABLE os
(
	objet VARCHAR(50) REFERENCES objet(nom),
	partie VARCHAR(50) NOT NULL,
	type VARCHAR(50) NOT NULL,
	taxon VARCHAR(50) NOT NULL, -- Changer le VARCHAR en ENUM.
	animal VARCHAR(50),
	type_animal VARCHAR(50),
	forme VARCHAR(50),
	dissous BOOLEAN, -- Mettre par défaut à FALSE.
	morsure BOOLEAN, -- Mettre par défaut à FALSE.
	conservation INTEGER NOT NULL,
	datation DATE -- Vérifier le type DATE correspond.
); -- Vérifier qu'il n'y a pas besoin de clé primaire.

/* Création de la table Silex. */
CREATE TABLE silex
(
	objet VARCHAR(50) REFERENCES objet(nom),
	provenance INTEGER REFERENCES gisement(identifiant), -- Peut être changer INTEGER en VARCHAR.
	couleur VARCHAR(50)
); -- Vérifier qu'il n'y a pas besoin de clé primaire.
