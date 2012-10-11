/* Sujet : Projet de base de données pour des fouilles archéologiques.
 * Auteurs : Xavier Muth & Antoine Hars
 * Fichier : bdd.sql
 */

/* Création de la database. */
CREATE DATABASE bdd_xavier owner jehu;

/****************************************************************************************/

/* Création de l'énumération pour la fonction d'une Personne. */
CREATE TYPE enum_fonction AS ENUM
('chercheur', 'fouilleur');

/* Création de l'énumération pour le type de Site. */
CREATE TYPE enum_type_site AS ENUM
('archeologique', 'paleontologique');

/* Création de l'énumération pour le type de Locus. */
CREATE TYPE enum_type_locus AS ENUM
('type1', 'type2');

/* Création de l'énumération pour le type d'un Objet. */
CREATE TYPE enum_type_objet AS ENUM
('FR', 'CO');

/* Création de l'énumération pour la nature d'un Objet. */
CREATE TYPE enum_nature AS ENUM
('silex', 'os', 'poterie', 'quartz', 'charbon', 'galet', 'perle');

/* Création de l'énumération pour le type d'un Galet. */
CREATE TYPE enum_type_galet AS ENUM
('schiste', 'quartz');

/* Création de l'énumération pour le type d'un Os. */
CREATE TYPE enum_taxon AS ENUM
('mammifere', 'oiseau', 'reptile');

/****************************************************************************************/

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
	fonction enum_fonction
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
	type enum_type_site,
	commentaire VARCHAR(500),
);

/* Création de la table Locus. */
CREATE TABLE locus
(
	nom VARCHAR(50) PRIMARY KEY,
	type enum_type_site,
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

/* Création de la table Carré. */
CREATE TABLE carre
{
	identifiant VARCHAR(50) PRIMARY KEY,
	locus VARCHAR(50) REFERENCES locus(nom)
}

/* Création de la table Décapage. */
CREATE TABLE decapage
{
	identifiant VARCHAR(50) PRIMARY KEY,
	carre VARCHAR(50) REFERENCES carre(identifiant)
}

/* Création de la table Fouille. */
CREATE TABLE fouille
{
	identifiant VARCHAR(50) PRIMARY KEY,
	annee DATE,
	fouilleur VARCHAR(50) REFERENCES personne(identifiant),
	decapage VARCHAR(50) REFERENCES decapage(identifiant)
}

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
	identifiant VARCHAR(50) PRIMARY KEY,
	date_prospection DATE,
	responsable INTEGER REFERENCES personne(identifiant)
	lieu VARCHAR(50) REFERENCES lieu(nom)
);

/* Création de la table Objet. */
CREATE TABLE objet
(
	nom VARCHAR(50) PRIMARY KEY,
	type enum_type_objet,
	poids FLOAT NOT NULL,
	longueur FLOAT NOT NULL,
	largeur FLOAT NOT NULL,
	hauteur FLOAT NOT NULL,
	nature enum_nature,
	fiche VARCHAR(50), -- Changer le VARCHAR pour avec des points 3D.
	brule BOOLEAN NOT NULL DEFAULT FALSE,
	periode DATE, -- Vérifier le type DATE.
	commentaire varchar(200),
	tamis BOOLEAN NOT NULL DEFAULT FALSE,
	trouve_par INTEGER REFERENCES personne(identifiant)
	collection VARCHAR(50) REFERENCES collection(nom)
	fouille VARCHAR(50) REFERENCES fouille(identifiant),
	prospection VARCHAR(50) REFERENCES prospection(identifiant)
);

/* Création de la table Galet. */
CREATE TABLE galet
(
	nom VARCHAR(50) PRIMARY KEY,
	type enum_type_galet,
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
	taxon enum_taxon,
	animal VARCHAR(50),
	type_animal VARCHAR(50),
	forme VARCHAR(50),
	dissous BOOLEAN NOT NULL DEFAULT FALSE,
	morsure BOOLEAN NOT NULL DEFAULT FALSE,
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
