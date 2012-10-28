/* Sujet : Projet de base de données pour des fouilles archéologiques.
 * Auteurs : Xavier Muth & Antoine Hars
 * Fichier : bdd.sql
 */

/* Création de la database. */
CREATE DATABASE archeo owner jehu;

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

/****************************************************************************************/

/* Création de la table Région. */
CREATE TABLE region
(
	identifiant SERIAL PRIMARY KEY,
	nom VARCHAR(50) NOT NULL,
	pays VARCHAR(50) NOT NULL
);

/* Création de la table Personne. */
CREATE TABLE personne
(
	identifiant SERIAL PRIMARY KEY,
	nom VARCHAR(50) NOT NULL,
	prenom VARCHAR(50) NOT NULL,
	nationalite INTEGER REFERENCES nationalite(identifiant),
	fonction INTEGER REFERENCES fonction(identifiant)
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
	appartient_a INTEGER REFERENCES personne(identifiant)
);

/* Création de la table Article. */
CREATE TABLE article
(
	identifiant SERIAL PRIMARY KEY,
	titre VARCHAR(100) NOT NULL,
	auteur INTEGER REFERENCES personne(identifiant),
	mot_cle VARCHAR(200),
	annee DATE NOT NULL, -- Vérifier si le type est bon.
	revue VARCHAR(100) NOT NULL,
	langue INTEGER REFERENCES langue(identifiant),
	sujet VARCHAR(50) NOT NULL -- Faire un trigger pour vérifier que le sujet est soit un site, soit une région ou soit une locus.
);

/* Création de la table collection. */
CREATE TABLE collection
(
	identifiant SERIAL PRIMARY KEY,
	nom VARCHAR(50) NOT NULL,
	proprietaire INTEGER REFERENCES personne(identifiant)
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
	commentaire VARCHAR(200)
);

/* Création de la table Carré. */
CREATE TABLE carre
(
	identifiant SERIAL PRIMARY KEY,
	nom VARCHAR(50) NOT NULL,
	locus INTEGER REFERENCES locus(identifiant)
);

/* Création de la table Décapage. */
CREATE TABLE decapage
(
	identifiant SERIAL PRIMARY KEY,
	nom VARCHAR(50) NOT NULL,
	carre INTEGER REFERENCES carre(identifiant)
);

/* Création de la table Fouille. */
CREATE TABLE fouille
(
	identifiant SERIAL PRIMARY KEY,
	nom VARCHAR(50) NOT NULL,
	annee DATE NOT NULL,  -- Vérification du type DATE.
	fouilleur INTEGER REFERENCES personne(identifiant),
	decapage INTEGER REFERENCES decapage(identifiant)
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
	commentaire VARCHAR(200)
);

/* Création de la table Prospection. */
CREATE TABLE prospection
(
	identifiant SERIAL PRIMARY KEY,
	nom VARCHAR(50) NOT NULL,
	date_prospection DATE NOT NULL,
	responsable INTEGER REFERENCES personne(identifiant),
	lieu INTEGER REFERENCES lieu(identifiant)
);

/****************************************************************************************/

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
	collection INTEGER REFERENCES collection(identifiant),
	fouille INTEGER REFERENCES fouille(identifiant),
	prospection INTEGER REFERENCES prospection(identifiant),
	fiche VARCHAR(50), -- Changer le VARCHAR pour avec des points 3D.
	commentaire VARCHAR(200)
);

/* Création de la table Galet. */
CREATE TABLE galet
(
	identifiant SERIAL PRIMARY KEY,
	objet INTEGER REFERENCES objet(identifiant),
	nom VARCHAR(50) NOT NULL,
	type INTEGER REFERENCES galetType(identifiant)
);

/* Création de la table Charbon. */
CREATE TABLE charbon
(
	objet INTEGER REFERENCES objet(identifiant),
	datation DATE NOT NULL
); -- Vérifier qu'il n'y ait pas besoin de clé primaire.

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
	datation DATE NOT NULL-- Vérifier le type DATE correspond.
); -- Vérifier qu'il n'y a pas besoin de clé primaire.

/* Création de la table Silex. */
CREATE TABLE silex
(
	objet INTEGER REFERENCES objet(identifiant),
	provenance INTEGER REFERENCES gisement(identifiant),
	couleur VARCHAR(50) NOT NULL
); -- Vérifier qu'il n'y a pas besoin de clé primaire.

/****************************************************************************************/

/* Jeu de valeurs de test. */
INSERT INTO langue (langue)
VALUES ('allemand');

INSERT INTO langue (langue)
VALUES ('anglais');

INSERT INTO langue (langue)
VALUES ('espagnol');

INSERT INTO langue (langue)
VALUES ('français');

INSERT INTO langue (langue)
VALUES ('japonais');

INSERT INTO langue (langue)
VALUES ('portuguais');

INSERT INTO galetType (type)
VALUES ('schiste');

INSERT INTO galetType (type)
VALUES ('quartz');

INSERT INTO locusType (type)
VALUES ('type1');

INSERT INTO locusType (type)
VALUES ('type2');

INSERT INTO siteType (type)
VALUES ('archeologique');

INSERT INTO siteType (type)
VALUES ('paleontologique');

INSERT INTO fonction (fonction)
VALUES ('chercheur');

INSERT INTO fonction (fonction)
VALUES ('fouilleur');

INSERT INTO objetType (type)
VALUES ('FR');

INSERT INTO objetType (type)
VALUES ('CO');

INSERT INTO objetNature (nature)
VALUES ('silex');

INSERT INTO objetNature (nature)
VALUES ('os');

INSERT INTO objetNature (nature)
VALUES ('poterie');

INSERT INTO objetNature (nature)
VALUES ('quartz');

INSERT INTO objetNature (nature)
VALUES ('charbon');

INSERT INTO objetNature (nature)
VALUES ('galet');

INSERT INTO objetNature (nature)
VALUES ('perle');

INSERT INTO osTaxon (taxon)
VALUES ('mammifère');

INSERT INTO osTaxon (taxon)
VALUES ('oiseau');

INSERT INTO osTaxon (taxon)
VALUES ('reptile');

INSERT INTO nationalite (nationalite)
VALUES ('française');

INSERT INTO nationalite (nationalite)
VALUES ('anglaise');

INSERT INTO nationalite (nationalite)
VALUES ('allemande');

INSERT INTO nationalite (nationalite)
VALUES ('américaine');

INSERT INTO nationalite (nationalite)
VALUES ('japonaise');

INSERT INTO nationalite (nationalite)
VALUES ('chinoise');

INSERT INTO nationalite (nationalite)
VALUES ('roumaine');

INSERT INTO nationalite (nationalite)
VALUES ('russe');

INSERT INTO periode (periode)
VALUES ('periode2');

INSERT INTO periode (periode)
VALUES ('periode1');

/****************************************************************************************/

INSERT INTO personne (nom, prenom, nationalite, fonction)
VALUES ('bob', 'patrick', 2, 2);

INSERT INTO personne (nom, prenom, nationalite, fonction)
VALUES ('muth', 'xavier', 1, 1);

INSERT INTO region (nom, pays)
VALUES ('region1', 'Russie');

INSERT INTO region (nom, pays)
VALUES ('region2', 'France');

INSERT INTO site (nom, region, position_nord, position_est, altitude, trouve_par, fouille_par, type, commentaire)
VALUES ('site1', 2, 32, 6, 23, 2, 1, 1, 'magnifique');

INSERT INTO site (nom, region, position_nord, position_est, altitude, trouve_par, fouille_par, type, commentaire)
VALUES ('site2', 1, 12, 4, 66, 1, 2, 2, 'chanmé');

INSERT INTO locus (nom, site, type, position_nord, position_est, altitude, trouve_par, appartient_a)
VALUES ('locus1', 1, 1, 3, 5, 7, 1, 2);

INSERT INTO locus (nom, site, type, position_nord, position_est, altitude, trouve_par, appartient_a)
VALUES ('locus2', 2, 2, 4, 5, 6, 2, 1);

INSERT INTO lieu (nom, region, position_nord, position_est, altitude, commentaire)
VALUES ('lieu1', 1, 3, 1, 3, 'choucroute');

INSERT INTO lieu (nom, region, position_nord, position_est, altitude, commentaire)
VALUES ('lieu2', 2, 76, 8, 5, 'patate');

INSERT INTO article (titre, auteur, mot_cle, annee, revue, langue, sujet)
VALUES ('titre1', 2, 'mot1 mot2', '01/12/2012', 'revue1', 4, 'site1');

INSERT INTO article (titre, auteur, mot_cle, annee, revue, langue, sujet)
VALUES ('titre2', 1, 'mot4', '23/01/2010', 'revue3', 1, 'site2');

INSERT INTO gisement (nom, region, position_nord, position_est, altitude, commentaire)
VALUES ('gisement1', 2, 43, 5, 21, '11111111111111');

INSERT INTO gisement (nom, region, position_nord, position_est, altitude, commentaire)
VALUES ('gisement2', 1, 43, 55, 777, 'ahah');

INSERT INTO prospection (nom, date_prospection, responsable, lieu)
VALUES ('11', '12/12/2012', 2, 1);

INSERT INTO prospection (nom, date_prospection, responsable, lieu)
VALUES ('22', '30/03/400', 1, 2);

INSERT INTO carre (nom, locus)
VALUES ('carre1', 2);

INSERT INTO carre (nom, locus)
VALUES ('carre2', 1);

INSERT INTO decapage (nom, carre)
VALUES ('decapage4', 1);

INSERT INTO decapage (nom, carre)
VALUES ('decapage2', 2);

INSERT INTO fouille (fouilleur, nom, annee, decapage)
VALUES (1, 'fouille3', '12/12/400', 1);

INSERT INTO fouille (fouilleur, nom, annee, decapage)
VALUES (2, 'fouille5', '2/2/1990', 2);

INSERT INTO collection (nom, proprietaire)
VALUES ('nom1', 2);

INSERT INTO collection (nom, proprietaire)
VALUES ('nom2', 2);

/****************************************************************************************/

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, fiche, brule, periode, tamis, trouve_par, fouille, commentaire)
VALUES ('objet1', 1, 3, 4, 76, 4, 1, 'fiche', TRUE, 1, FALSE, 1, 1, 'commentaire');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, fiche, brule, periode, tamis, trouve_par, collection, prospection, commentaire)
VALUES ('objet2', 2, 3, 4, 76, 4, 1, 'fi3he1', FALSE, 2, FALSE, 2, 2, 1, 'mentaire');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, fiche, brule, periode, tamis, trouve_par, fouille, commentaire)
VALUES ('objet3', 2, 4, 43, 1, 4, 2, 'fich31', TRUE, 1, FALSE, 1, 2, 'aire');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, fiche, brule, periode, tamis, trouve_par, prospection, commentaire)
VALUES ('objet4', 1, 4, 43, 1, 4, 2, 'fiche', FALSE, 2, TRUE, 1, 2, 'commen');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, fiche, brule, periode, tamis, trouve_par, collection, fouille, commentaire)
VALUES ('objet5', 2, 4, 43, 1, 4, 5, 'fich', TRUE, 1, TRUE, 2, 2, 1, 'coentaire');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, fiche, brule, periode, tamis, trouve_par, prospection, commentaire)
VALUES ('objet6', 1, 4, 43, 1, 4, 5, 'che1', FALSE, 2, FALSE, 2, 1, 'centaire');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, fiche, brule, periode, tamis, trouve_par, collection, fouille, commentaire)
VALUES ('objet7', 2, 4, 43, 1, 4, 6, 'fie1', TRUE, 1, TRUE, 2, 2, 2, 'commente');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, fiche, brule, periode, tamis, trouve_par, collection, prospection, commentaire)
VALUES ('objet8', 1, 4, 43, 1, 4, 6, 'fhe1', FALSE, 2, FALSE, 1, 1, 1, 'commene');

INSERT INTO charbon (datation, objet)
VALUES ('2/2/500', 5);

INSERT INTO charbon (datation, objet)
VALUES ('1/1/1', 6);

INSERT INTO galet (nom, objet, type)
VALUES ('galet1', 7, 1);

INSERT INTO galet (nom, objet, type)
VALUES ('galet2', 8, 2);

INSERT INTO os (objet, partie, type, taxon, animal, type_animal, forme, dissous, morsure, conservation, datation)
VALUES (4, 'cul', 1, 1, 'truie', 'ta soeur', 'ovale', FALSE, FALSE, 6, '23/12/90');

INSERT INTO os (objet, partie, type, taxon, animal, type_animal, forme, dissous, morsure, conservation, datation)
VALUES (3, 'tete', 2, 2, 'rat', 'ta mere', 'sinusoidale', TRUE, TRUE, 4, '1/1/1');

INSERT INTO silex (objet, provenance, couleur)
VALUES (2, 1, 'black');

INSERT INTO silex (objet, provenance, couleur)
VALUES (1, 2, 'yellow');

/****************************************************************************************/

/* Suppression des tables. */
DROP TABLE os;
DROP TABLE charbon;
DROP TABLE silex;
DROP TABLE galet;
DROP TABLE objet;
DROP TABLE gisement;
DROP TABLE collection;
DROP TABLE fouille;
DROP TABLE decapage;
DROP TABLE carre;
DROP TABLE prospection;
DROP TABLE lieu;
DROP TABLE article;
DROP TABLE locus;
DROP TABLE site;
DROP TABLE region;
DROP TABLE personne;
DROP TABLE langue;
DROP TABLE nationalite;
DROP TABLE objetnature;
DROP TABLE objettype;
DROP TABLE galettype;
DROP TABLE ostaxon;
DROP TABLE sitetype;
DROP TABLE fonction;
DROP TABLE locustype;
DROP TABLE periode;

/****************************************************************************************/
