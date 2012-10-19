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
	commentaire VARCHAR(500)
);

/* Création de la table Locus. */
CREATE TABLE locus
(
	nom VARCHAR(50) PRIMARY KEY,
	type enum_type_locus,
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
(
	identifiant VARCHAR(50) PRIMARY KEY,
	locus VARCHAR(50) REFERENCES locus(nom)
);

/* Création de la table Décapage. */
CREATE TABLE decapage
(
	identifiant VARCHAR(50) PRIMARY KEY,
	carre VARCHAR(50) REFERENCES carre(identifiant)
);

/* Création de la table Fouille. */
CREATE TABLE fouille
(
	identifiant VARCHAR(50) PRIMARY KEY,
	annee DATE,
	fouilleur INTEGER REFERENCES personne(identifiant),
	decapage VARCHAR(50) REFERENCES decapage(identifiant)
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
	identifiant VARCHAR(50) PRIMARY KEY,
	date_prospection DATE,
	responsable INTEGER REFERENCES personne(identifiant),
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
	trouve_par INTEGER REFERENCES personne(identifiant),
	collection VARCHAR(50) REFERENCES collection(nom),
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


/****************************************************************************************/

/* Jeu de valeurs de test. */
INSERT INTO personne (identifiant, nom, prenom, nationalite, fonction)
VALUES (2, 'bob', 'patrick', 'russe', 'chercheur');

INSERT INTO personne (identifiant, nom, prenom, nationalite, fonction)
VALUES (1, 'muth', 'xavier', 'francaise', 'fouilleur');

INSERT INTO region (nom, pays)
VALUES ('region1', 'pays2');

INSERT INTO region (nom, pays)
VALUES ('region2', 'pays1');

INSERT INTO site (nom, region, position_nord, position_est, altitude, trouve_par, fouille_par, type, commentaire)
VALUES ('site1', 'region2', 32, 6, 23, 2, 1, 'archeologique', 'magnifique');

INSERT INTO site (nom, region, position_nord, position_est, altitude, trouve_par, fouille_par, type, commentaire)
VALUES ('site2', 'region1', 12, 4, 66, 1, 2, 'paleontologique', 'chanmé');

INSERT INTO locus (nom, site, type, position_nord, position_est, altitude, trouve_par, appartient_a)
VALUES ('locus1', 'site2', 'type1', 3, 5, 7, 1, 2);

INSERT INTO locus (nom, site, type, position_nord, position_est, altitude, trouve_par, appartient_a)
VALUES ('locus2', 'site1', 'type2', 4, 5, 6, 2, 1);

INSERT INTO lieu (nom, region, position_nord, position_est, altitude, commentaire)
VALUES ('lieu1', 'region1', 3, 1, 3, 'choucroute');

INSERT INTO lieu (nom, region, position_nord, position_est, altitude, commentaire)
VALUES ('lieu2', 'region2', 76, 8, 5, 'patate');

INSERT INTO article (titre, auteur, mot_cle, annee, revue, langue, sujet)
VALUES ('titre1', 2, 'mot1 mot2', '01/12/2012', 'revue1', 'langue1', 'site1');

INSERT INTO article (titre, auteur, mot_cle, annee, revue, langue, sujet)
VALUES ('titre2', 1, 'mot4', '23/01/2010', 'revue3', 'langue20', 'site2');

INSERT INTO gisement (identifiant, region, position_nord, position_est, altitude, commentaire)
VALUES (1, 'region2', 43, 5, 21, '11111111111111');

INSERT INTO gisement (identifiant, region, position_nord, position_est, altitude, commentaire)
VALUES (2, 'region1', 43, 55, 777, 'ahah');

INSERT INTO prospection (identifiant, date_prospection, responsable, lieu)
VALUES ('11', '12/12/2012', 2, 'lieu1');

INSERT INTO prospection (identifiant, date_prospection, responsable, lieu)
VALUES ('22', '30/03/400', 1, 'lieu2');

INSERT INTO carre (identifiant, locus)
VALUES ('id1', 'locus2');

INSERT INTO carre (identifiant, locus)
VALUES ('id2', 'locus1');

INSERT INTO decapage (identifiant, carre)
VALUES ('id4', 'id1');

INSERT INTO decapage (identifiant, carre)
VALUES ('id2', 'id2');

INSERT INTO fouille (fouilleur, identifiant, annee, decapage)
VALUES (1, 'id3', '12/12/400', 'id4');

INSERT INTO fouille (fouilleur, identifiant, annee, decapage)
VALUES (2, 'id5', '2/2/1990', 'id2');

INSERT INTO collection (nom, proprietaire)
VALUES ('nom1', 2);

INSERT INTO collection (nom, proprietaire)
VALUES ('nom2', 2);

/* **************************************** */

/* Valeurs NULL. */
INSERT INTO personne (identifiant, nom, prenom, nationalite, fonction)
VALUES (0, 'null', 'null', 'null', 'fouilleur');

INSERT INTO collection (nom, proprietaire)
VALUES ('null', 0);

INSERT INTO fouille (fouilleur, identifiant, annee, decapage)
VALUES (0, '0', '12/12/12', 'id4');

INSERT INTO prospection(identifiant, date_prospection, responsable, lieu)
VALUES ('0', '12/12/12', 0, 'lieu1');

/* **************************************** */

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, fiche, brule, periode, tamis, trouve_par, collection, fouille, prospection,commentaire)
VALUES ('objet1', 'FR', 3, 4, 76, 4, 'silex', 'fiche1', TRUE, '12/4/30', FALSE, 1, 'null', 'id3', '0', 'commentaire');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, fiche, brule, periode, tamis, trouve_par, collection, fouille, prospection,commentaire)
VALUES ('objet2', 'FR', 3, 4, 76, 4, 'silex', 'fi3he1', FALSE, '12/4/30', FALSE, 2, 'nom1', '0', '11', 'mentaire');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, fiche, brule, periode, tamis, trouve_par, collection, fouille, prospection,commentaire)
VALUES ('objet3', 'CO', 4, 43, 1, 4, 'os', 'fich31', TRUE, '12/4/30', FALSE, 1, 'null', 'id5', '0', 'aire');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, fiche, brule, periode, tamis, trouve_par, collection, fouille, prospection,commentaire)
VALUES ('objet4', 'FR', 4, 43, 1, 4, 'os', 'fiche', FALSE, '12/4/30', TRUE, 1, 'null', '0', '22', 'commen');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, fiche, brule, periode, tamis, trouve_par, collection, fouille, prospection,commentaire)
VALUES ('objet5', 'CO', 4, 43, 1, 4, 'charbon', 'fich', TRUE, '12/4/30', TRUE, 2, 'nom2', 'id3', '0', 'coentaire');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, fiche, brule, periode, tamis, trouve_par, collection, fouille, prospection,commentaire)
VALUES ('objet6', 'FR', 4, 43, 1, 4, 'charbon', 'che1', FALSE, '12/4/30', FALSE, 2, 'null', '0', '22', 'centaire');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, fiche, brule, periode, tamis, trouve_par, collection, fouille, prospection,commentaire)
VALUES ('objet7', 'CO', 4, 43, 1, 4, 'galet', 'fie1', TRUE, '12/4/30', TRUE, 2, 'nom2', 'id5', '0', 'commente');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, fiche, brule, periode, tamis, trouve_par, collection, fouille, prospection,commentaire)
VALUES ('objet8', 'FR', 4, 43, 1, 4, 'galet', 'fhe1', FALSE, '12/4/30', FALSE, 1, 'nom1', '0', '11', 'commene');

INSERT INTO charbon (datation, objet)
VALUES ('2/2/500', 'objet5');

INSERT INTO charbon (datation, objet)
VALUES ('1/1/1', 'objet6');

INSERT INTO galet (nom, objet, type)
VALUES ('galet1', 'objet7', 'quartz');

INSERT INTO galet (nom, objet, type)
VALUES ('galet2', 'objet8', 'schiste');

INSERT INTO os (objet, partie, type, taxon, animal, type_animal, forme, dissous, morsure, conservation, datation)
VALUES ('objet4', 'cul', 'type1', 'oiseau', 'truie', 'ta soeur', 'ovale', FALSE, FALSE, 6, '23/12/90');

INSERT INTO os (objet, partie, type, taxon, animal, type_animal, forme, dissous, morsure, conservation, datation)
VALUES ('objet3', 'tete', 'type2', 'reptile', 'rat', 'ta mere', 'sinusoidale', TRUE, TRUE, 4, '1/1/1');

INSERT INTO silex (objet, provenance, couleur)
VALUES ('objet2', 1, 'black');

INSERT INTO silex (objet, provenance, couleur)
VALUES ('objet1', 2, 'yellow');

/****************************************************************************************/

