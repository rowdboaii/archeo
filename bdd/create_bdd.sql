/* Sujet : Projet de base de données pour des fouilles archéologiques.
 * Auteurs : Xavier Muth & Antoine Hars
 * Fichier : create_bdd.sql
 */

/* Création de la database. */
CREATE DATABASE archeo owner jehu;

/****************************************************************************************/

/* Création d'une énumération pour le Type de Sujet. */
CREATE TYPE enum_type_sujet AS ENUM
(
	'region', 'locus', 'site'
);

/* Création d'une énumération pour le Type de Recherche pour un Objet. */
CREATE TYPE enum_type_recherche AS ENUM
(
	' ', 'prospection', 'fouille'
);

/****************************************************************************************/

/* Création de la table OsTaxon. */
CREATE TABLE osTaxon
(
	identifiant SERIAL PRIMARY KEY,
	taxon VARCHAR(50) NOT NULL
);

/* Création de la table ObjetNature. */
CREATE TABLE objetNature
(
	identifiant SERIAL PRIMARY KEY,
	nature VARCHAR(50) NOT NULL
);

/* Création de la table Fonction. */
CREATE TABLE fonction
(
	identifiant SERIAL PRIMARY KEY,
	fonction VARCHAR(50) NOT NULL
);

/* Création de la table ObjetType. */
CREATE TABLE objetType
(
	identifiant SERIAL PRIMARY KEY,
	type VARCHAR(50) NOT NULL
);

/* Création de la table LocusType. */
CREATE TABLE locusType
(
	identifiant SERIAL PRIMARY KEY,
	type VARCHAR(50) NOT NULL
);

/* Création de la table SiteType. */
CREATE TABLE siteType
(
	identifiant SERIAL PRIMARY KEY,
	type VARCHAR(50) NOT NULL
);

/* Création de la table GaletType. */
CREATE TABLE galetType
(
	identifiant SERIAL PRIMARY KEY,
	type VARCHAR(50) NOT NULL
);

/* Création de la table Langue. */
CREATE TABLE langue
(
	identifiant SERIAL PRIMARY KEY,
	langue VARCHAR(50) NOT NULL
);

/* Création de la table Nationalite. */
CREATE TABLE nationalite
(
	identifiant SERIAL PRIMARY KEY,
	nationalite VARCHAR(50) NOT NULL
);

/* Création de la table Période. */
CREATE TABLE periode
(
	identifiant SERIAL PRIMARY KEY,
	periode VARCHAR(50) NOT NULL
);

/* Création de la table Pays. */
CREATE TABLE pays
(
	identifiant SERIAL PRIMARY KEY,
	nom VARCHAR(50) NOT NULL
);

/****************************************************************************************/

/* Création de la table Région. */
CREATE TABLE region
(
	identifiant SERIAL PRIMARY KEY,
	nom VARCHAR(50) NOT NULL,
	pays INTEGER REFERENCES pays(identifiant),
	commentaire VARCHAR(500)
);

/* Création de la table Personne. */
CREATE TABLE personne
(
	identifiant SERIAL PRIMARY KEY,
	nom VARCHAR(50) NOT NULL,
	prenom VARCHAR(50) NOT NULL,
	nationalite INTEGER REFERENCES nationalite(identifiant),
	fonction INTEGER REFERENCES fonction(identifiant),
	commentaire VARCHAR(500)
);

/* Création de la table Site. */
CREATE TABLE site
(
	identifiant SERIAL PRIMARY KEY,
	nom VARCHAR(50) NOT NULL,
	region INTEGER REFERENCES region(identifiant),
	position_nord FLOAT NOT NULL,
	position_est FLOAT NOT NULL,
	altitude FLOAT NOT NULL,
	trouve_par INTEGER REFERENCES personne(identifiant),
	fouille_par INTEGER REFERENCES personne(identifiant),
	type INTEGER REFERENCES siteType(identifiant),
	commentaire VARCHAR(500)
);

/* Création de la table Locus. */
CREATE TABLE locus
(
	identifiant SERIAL PRIMARY KEY,
	nom VARCHAR(50) NOT NULL,
	type INTEGER REFERENCES locusType(identifiant),
	site INTEGER REFERENCES site(identifiant),
	position_nord FLOAT NOT NULL,
	position_est FLOAT NOT NULL,
	altitude FLOAT NOT NULL,
	trouve_par INTEGER REFERENCES personne(identifiant),
	appartient_a INTEGER REFERENCES personne(identifiant),
	commentaire VARCHAR(500)
);

/* Création de la table Article. */
CREATE TABLE article
(
	identifiant SERIAL PRIMARY KEY,
	titre VARCHAR(100) NOT NULL,
	auteur INTEGER REFERENCES personne(identifiant),
	mot_cle VARCHAR(200),
	annee DATE NOT NULL,
	revue VARCHAR(100) NOT NULL,
	langue INTEGER REFERENCES langue(identifiant),
	sujet INTEGER NOT NULL,
	type_sujet enum_type_sujet NOT NULL,
	commentaire VARCHAR(500)
);

/* Création de la table collection. */
CREATE TABLE collection
(
	identifiant SERIAL PRIMARY KEY,
	nom VARCHAR(50) NOT NULL,
	proprietaire INTEGER REFERENCES personne(identifiant)
	commentaire VARCHAR(500)
);

/* Création de la table Gisement. */
CREATE TABLE gisement
(
	identifiant SERIAL PRIMARY KEY,
	nom VARCHAR(50) NOT NULL,
	region INTEGER REFERENCES region(identifiant),
	position_nord FLOAT NOT NULL,
	position_est FLOAT NOT NULL,
	altitude FLOAT NOT NULL,
	commentaire VARCHAR(500)
);

/* Création de la table Carré. */
CREATE TABLE carre
(
	identifiant SERIAL PRIMARY KEY,
	nom VARCHAR(50) NOT NULL,
	locus INTEGER REFERENCES locus(identifiant),
	commentaire VARCHAR(500)
);

/* Création de la table Décapage. */
CREATE TABLE decapage
(
	identifiant SERIAL PRIMARY KEY,
	nom VARCHAR(50) NOT NULL,
	carre INTEGER REFERENCES carre(identifiant),
	commentaire VARCHAR(500)
);

/* Création de la table Fouille. */
CREATE TABLE fouille
(
	identifiant SERIAL PRIMARY KEY,
	nom VARCHAR(50) NOT NULL,
	annee DATE NOT NULL,
	fouilleur INTEGER REFERENCES personne(identifiant),
	decapage INTEGER REFERENCES decapage(identifiant),
	commentaire VARCHAR(500)
);

/* Création de la table Lieu. */
CREATE TABLE lieu
(
	identifiant SERIAL PRIMARY KEY,
	nom VARCHAR(50) NOT NULL,
	region INTEGER REFERENCES region(identifiant),
	position_nord FLOAT NOT NULL,
	position_est FLOAT NOT NULL,
	altitude FLOAT NOT NULL,
	commentaire VARCHAR(500)
);

/* Création de la table Prospection. */
CREATE TABLE prospection
(
	identifiant SERIAL PRIMARY KEY,
	nom VARCHAR(50) NOT NULL,
	date_prospection DATE NOT NULL,
	responsable INTEGER REFERENCES personne(identifiant),
	lieu INTEGER REFERENCES lieu(identifiant),
	commentaire VARCHAR(500)
);

/* Création de la table Objet. */
CREATE TABLE objet
(
	identifiant SERIAL PRIMARY KEY,
	nom VARCHAR(50) NOT NULL,
	type INTEGER REFERENCES objetType(identifiant),
	poids FLOAT NOT NULL,
	longueur FLOAT NOT NULL,
	largeur FLOAT NOT NULL,
	hauteur FLOAT NOT NULL,
	nature INTEGER REFERENCES objetNature(identifiant),
	brule BOOLEAN NOT NULL DEFAULT FALSE,
	periode INTEGER REFERENCES periode(identifiant),
	tamis BOOLEAN NOT NULL DEFAULT FALSE,
	trouve_par INTEGER REFERENCES personne(identifiant),
	collection INTEGER,
	type_recherche enum_type_recherche NOT NULL,
	recherche INTEGER,
	fiche VARCHAR(50), -- Changer le VARCHAR pour avec des points 3D.
	commentaire VARCHAR(500)
);

/* Création de la table Galet. */
CREATE TABLE galet
(
	objet INTEGER REFERENCES objet(identifiant),
	nom VARCHAR(50) NOT NULL,
	type INTEGER REFERENCES galetType(identifiant)
);

/* Création de la table Charbon. */
CREATE TABLE charbon
(
	objet INTEGER REFERENCES objet(identifiant),
	datation DATE NOT NULL
);

/* Création de la table Os. */
CREATE TABLE os
(
	objet INTEGER REFERENCES objet(identifiant),
	partie VARCHAR(50) NOT NULL,
	type VARCHAR(50) NOT NULL,
	taxon INTEGER REFERENCES osTaxon(identifiant),
	animal VARCHAR(50),
	type_animal VARCHAR(50),
	forme VARCHAR(50) NOT NULL,
	dissous BOOLEAN NOT NULL DEFAULT FALSE,
	morsure BOOLEAN NOT NULL DEFAULT FALSE,
	conservation INTEGER NOT NULL,
	datation DATE NOT NULL
);

/* Création de la table Silex. */
CREATE TABLE silex
(
	objet INTEGER REFERENCES objet(identifiant),
	provenance INTEGER REFERENCES gisement(identifiant),
	couleur VARCHAR(50) NOT NULL
);

