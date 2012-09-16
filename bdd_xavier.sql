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
	nationalite VARCHAR(50) NOT NULL,
	fonction VARCHAR(50) NOT NULL, -- Changer le VARCHAR en ENUM.
	CONSTRAINT personne_pkey PRIMARY KEY(nom, prenom)
);

/* Création de la table Site. */
CREATE TABLE site
(
	nom VARCHAR(50) PRIMARY KEY,
	region VARCHAR(50) NOT NULL,
	position_nord FLOAT,
	position_est FLOAT,
	altitude FLOAT,
	trouve_par VARCHAR(100) NOT NULL, -- Clé étrangère sur Personne à ajouter.
	fouille_par VARCHAR(100) NOT NULL, -- Clé étrangère sur Personne à ajouter.
	type VARCHAR(50) NOT NULL, -- Changer le VARCHAR en ENUM.
	commentaire VARCHAR(500),
);

/* Ajout de la clé étrangère de Site.region sur Region.nom. */
ALTER TABLE site ADD CONSTRAINT region_fk FOREIGN KEY(region) REFERENCES region(nom) MATCH FULL;

/* Création de la table Locus. */
CREATE TABLE locus
(
	nom VARCHAR(50) PRIMARY KEY,
	type VARCHAR(50) NOT NULL, -- Changer le VARCHAR en ENUM.
	position_nord FLOAT,
	position_est FLOAT,
	altitude FLOAT,
	trouve_par VARCHAR(50) NOT NULL, -- Clé étrangère sur Personne à ajouter.
	appartient_a VARCHAR(50) NOT NULL -- Clé étrangère sur Personne à ajouter.
);

/* Création de la table Article. */
CREATE TABLE article
(
	titre VARCHAR(100) PRIMARY KEY,
	auteur VARCHAR(100) NOT NULL, -- Clé étrangère sur Personne à ajouter.
	mot_cle VARCHAR(200),
	annee DATE, -- Vérifier si le type est bon.
	revue VARCHAR(100) NOT NULL,
	langue VARCHAR(50) NOT NULL,
	sujet VARCHAR(50) NOT NULL -- Faire un trigger pour vérifier que le sujet est soit un site, soit une région ou soit une locus.
);
