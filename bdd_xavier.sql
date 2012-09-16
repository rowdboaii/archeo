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
