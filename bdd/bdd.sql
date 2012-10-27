/* Sujet : Projet de base de données pour des fouilles archéologiques.
 * Auteurs : Xavier Muth & Antoine Hars
 * Fichier : bdd.sql
 */

/* Création de la database. */
CREATE DATABASE archeo owner jehu;

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

/* Création de la table Langue. */
CREATE TABLE langue
(
	identifiant SERIAL PRIMARY KEY,
	langue VARCHAR(50) NOT NULL
);

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
	nationalite VARCHAR(50) NOT NULL,
	fonction enum_fonction NOT NULL
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
	type enum_type_site NOT NULL,
	commentaire VARCHAR(500)
);

/* Création de la table Locus. */
CREATE TABLE locus
(
	identifiant SERIAL PRIMARY KEY,
	nom VARCHAR(50) NOT NULL,
	type enum_type_locus NOT NULL,
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
	locus integer REFERENCES locus(identifiant)
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

/* Création de la table Objet. */
CREATE TABLE objet
(
	identifiant SERIAL PRIMARY KEY,
	nom VARCHAR(50) NOT NULL,
	type enum_type_objet NOT NULL,
	poids FLOAT NOT NULL,
	longueur FLOAT NOT NULL,
	largeur FLOAT NOT NULL,
	hauteur FLOAT NOT NULL,
	nature enum_nature NOT NULL,
	brule BOOLEAN NOT NULL DEFAULT FALSE,
	periode DATE NOT NULL, -- Vérifier le type DATE.
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
	type enum_type_galet NOT NULL
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
	taxon enum_taxon NOT NULL,
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

/* Valeurs NULL. */
INSERT INTO personne (identifiant, nom, prenom, nationalite, fonction)
VALUES (0, 'null', 'null', 'null', 'fouilleur');

INSERT INTO collection (identifiant, nom, proprietaire)
VALUES (0, 'null', 0);

INSERT INTO fouille (fouilleur, identifiant, nom, annee, decapage)
VALUES (0, '0', 'null', '12/12/12', 1);

INSERT INTO prospection(identifiant, nom, date_prospection, responsable, lieu)
VALUES (0, '0', '12/12/12', 0, 1);

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

INSERT INTO personne (nom, prenom, nationalite, fonction)
VALUES ('bob', 'patrick', 'russe', 'chercheur');

INSERT INTO personne (nom, prenom, nationalite, fonction)
VALUES ('muth', 'xavier', 'francaise', 'fouilleur');

INSERT INTO region (nom, pays)
VALUES ('region1', 'pays2');

INSERT INTO region (nom, pays)
VALUES ('region2', 'pays1');

INSERT INTO site (nom, region, position_nord, position_est, altitude, trouve_par, fouille_par, type, commentaire)
VALUES ('site1', 2, 32, 6, 23, 2, 1, 'archeologique', 'magnifique');

INSERT INTO site (nom, region, position_nord, position_est, altitude, trouve_par, fouille_par, type, commentaire)
VALUES ('site2', 1, 12, 4, 66, 1, 2, 'paleontologique', 'chanmé');

INSERT INTO locus (nom, site, type, position_nord, position_est, altitude, trouve_par, appartient_a)
VALUES ('locus1', 1, 'type1', 3, 5, 7, 1, 2);

INSERT INTO locus (nom, site, type, position_nord, position_est, altitude, trouve_par, appartient_a)
VALUES ('locus2', 2, 'type2', 4, 5, 6, 2, 1);

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

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, fiche, brule, periode, tamis, trouve_par, collection, fouille, prospection, commentaire)
VALUES ('objet1', 'FR', 3, 4, 76, 4, 'silex', 'fiche', TRUE, '12/4/30', FALSE, 1, 0, 1, 0, 'commentaire');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, fiche, brule, periode, tamis, trouve_par, collection, fouille, prospection, commentaire)
VALUES ('objet2', 'FR', 3, 4, 76, 4, 'silex', 'fi3he1', FALSE, '12/4/30', FALSE, 2, 2, 0, 1, 'mentaire');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, fiche, brule, periode, tamis, trouve_par, collection, fouille, prospection, commentaire)
VALUES ('objet3', 'CO', 4, 43, 1, 4, 'os', 'fich31', TRUE, '12/4/30', FALSE, 1, 0, 2, 0, 'aire');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, fiche, brule, periode, tamis, trouve_par, collection, fouille, prospection, commentaire)
VALUES ('objet4', 'FR', 4, 43, 1, 4, 'os', 'fiche', FALSE, '12/4/30', TRUE, 1, 0, 0, 2, 'commen');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, fiche, brule, periode, tamis, trouve_par, collection, fouille, prospection, commentaire)
VALUES ('objet5', 'CO', 4, 43, 1, 4, 'charbon', 'fich', TRUE, '12/4/30', TRUE, 2, 2, 1, 0, 'coentaire');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, fiche, brule, periode, tamis, trouve_par, collection, fouille, prospection, commentaire)
VALUES ('objet6', 'FR', 4, 43, 1, 4, 'charbon', 'che1', FALSE, '12/4/30', FALSE, 2, 0, 0, 1, 'centaire');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, fiche, brule, periode, tamis, trouve_par, collection, fouille, prospection, commentaire)
VALUES ('objet7', 'CO', 4, 43, 1, 4, 'galet', 'fie1', TRUE, '12/4/30', TRUE, 2, 2, 2, 0, 'commente');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, fiche, brule, periode, tamis, trouve_par, collection, fouille, prospection, commentaire)
VALUES ('objet8', 'FR', 4, 43, 1, 4, 'galet', 'fhe1', FALSE, '12/4/30', FALSE, 1, 1, 0, 1, 'commene');

INSERT INTO charbon (datation, objet)
VALUES ('2/2/500', 5);

INSERT INTO charbon (datation, objet)
VALUES ('1/1/1', 6);

INSERT INTO galet (nom, objet, type)
VALUES ('galet1', 7, 'quartz');

INSERT INTO galet (nom, objet, type)
VALUES ('galet2', 8, 'schiste');

INSERT INTO os (objet, partie, type, taxon, animal, type_animal, forme, dissous, morsure, conservation, datation)
VALUES (4, 'cul', 'type1', 'oiseau', 'truie', 'ta soeur', 'ovale', FALSE, FALSE, 6, '23/12/90');

INSERT INTO os (objet, partie, type, taxon, animal, type_animal, forme, dissous, morsure, conservation, datation)
VALUES (3, 'tete', 'type2', 'reptile', 'rat', 'ta mere', 'sinusoidale', TRUE, TRUE, 4, '1/1/1');

INSERT INTO silex (objet, provenance, couleur)
VALUES (2, 1, 'black');

INSERT INTO silex (objet, provenance, couleur)
VALUES (1, 2, 'yellow');

/****************************************************************************************/

