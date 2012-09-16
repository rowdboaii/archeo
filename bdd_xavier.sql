CREATE DATABASE bdd_xavier owner jehu;

CREATE TABLE region
(
	nom VARCHAR(50) PRIMARY KEY,
	pays VARCHAR(50) NOT NULL
);

CREATE TABLE personne
(
	nom VARCHAR(50),
	prenom VARCHAR(50),
	nationalite VARCHAR(50) NOT NULL,
	fonction VARCHAR(50) NOT NULL,
	CONSTRAINT personne_pkey PRIMARY KEY(nom, prenom)
);

CREATE TABLE site
(
	nom VARCHAR(50) PRIMARY KEY,
	region VARCHAR(50) NOTN NULL,
	position_nord FLOAT,
	position_est FLOAT,
	altitude FLOAT,
	trouve_par VARCHAR(100) NOT NULL,
	fouille_par VARCHAR(100) NOT NULL,
	type VARCHAR(50) NOT NULL,
	commentaire VARCHAR(500),
);
