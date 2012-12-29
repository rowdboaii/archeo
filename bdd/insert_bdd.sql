/* Sujet : Projet de base de données pour des fouilles archéologiques.
 * Auteur : Antoine Hars
 * Fichier : insert_bdd.sql
 */

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

INSERT INTO pays (nom)
VALUES ('France');

INSERT INTO pays (nom)
VALUES ('Allemagne');

INSERT INTO personne (nom, prenom, nationalite, fonction, commentaire)
VALUES ('bob', 'patrick', 2, 2, 'commentaire');

INSERT INTO personne (nom, prenom, nationalite, fonction, commentaire)
VALUES ('muth', 'xavier', 1, 1, 'commentaire');

INSERT INTO region (nom, pays, commentaire)
VALUES ('region1', 1, 'commentaire');

INSERT INTO region (nom, pays, commentaire)
VALUES ('region2', 2, 'commentaire');

INSERT INTO site (nom, region, position_nord, position_est, altitude, trouve_par, fouille_par, type, commentaire)
VALUES ('site1', 2, 32, 6, 23, 2, 1, 1, 'commentaire');

INSERT INTO site (nom, region, position_nord, position_est, altitude, trouve_par, fouille_par, type, commentaire)
VALUES ('site2', 1, 12, 4, 66, 1, 2, 2, 'commentaire');

INSERT INTO locus (nom, site, type, position_nord, position_est, altitude, trouve_par, appartient_a, commentaire)
VALUES ('locus1', 1, 1, 3, 5, 7, 1, 2, 'commentaire');

INSERT INTO locus (nom, site, type, position_nord, position_est, altitude, trouve_par, appartient_a, commentaire)
VALUES ('locus2', 2, 2, 4, 5, 6, 2, 1, 'commentaire');

INSERT INTO lieu (nom, region, position_nord, position_est, altitude, commentaire)
VALUES ('lieu1', 1, 3, 1, 3, 'commentaire');

INSERT INTO lieu (nom, region, position_nord, position_est, altitude, commentaire)
VALUES ('lieu2', 2, 76, 8, 5, 'commentaire');

INSERT INTO article (titre, auteur, mot_cle, annee, revue, langue, sujet, type_sujet, commentaire)
VALUES ('titre1', 2, 'mot1 mot2', '01/12/2012', 'revue1', 4, 1, 'site', 'commentaire');

INSERT INTO article (titre, auteur, mot_cle, annee, revue, langue, sujet, type_sujet, commentaire)
VALUES ('titre2', 1, 'mot4', '01/23/2010', 'revue3', 1, 2, 'region', 'commentaire');

INSERT INTO article (titre, auteur, mot_cle, annee, revue, langue, sujet, type_sujet, commentaire)
VALUES ('titre3', 2, 'mot5', '02/01/2010', 'rev&',3, 1, 'site', 'commentaire');

INSERT INTO gisement (nom, region, position_nord, position_est, altitude, commentaire)
VALUES ('gisement1', 2, 43, 5, 21, 'commentaire');

INSERT INTO gisement (nom, region, position_nord, position_est, altitude, commentaire)
VALUES ('gisement2', 1, 43, 55, 777, 'commentaire');

INSERT INTO prospection (nom, date_prospection, responsable, lieu, commentaire)
VALUES ('11', '12/12/2012', 2, 1, 'commentaire');

INSERT INTO prospection (nom, date_prospection, responsable, lieu, commentaire)
VALUES ('22', '03/30/400', 1, 2, 'commentaire');

INSERT INTO carre (nom, locus, commentaire)
VALUES ('carre1', 2, 'commentaire');

INSERT INTO carre (nom, locus, commentaire)
VALUES ('carre2', 1, 'commentaire');

INSERT INTO decapage (nom, carre, commentaire)
VALUES ('decapage4', 1, 'commentaire');

INSERT INTO decapage (nom, carre, commentaire)
VALUES ('decapage2', 2, 'commentaire');

INSERT INTO fouille (fouilleur, nom, annee, decapage, commentaire)
VALUES (1, 'fouille3', '12/12/400', 1, 'commentaire');

INSERT INTO fouille (fouilleur, nom, annee, decapage, commentaire)
VALUES (2, 'fouille5', '2/2/1990', 2, 'commentaire');

INSERT INTO collection (nom, proprietaire, commentaire)
VALUES ('nom1', 2, 'commentaire');

INSERT INTO collection (nom, proprietaire, commentaire)
VALUES ('nom2', 2, 'commentaire');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, recherche, type_recherche, collection, brule, periode, tamis, trouve_par, commentaire)
VALUES ('objet1', 1, 3, 4, 76, 4, 1, 2, 'fouille', 0, TRUE, 1, FALSE, 1, 'commentaire');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, recherche, type_recherche, collection, brule, periode, tamis, trouve_par, commentaire)
VALUES ('objet2', 2, 3, 4, 76, 4, 1, 2, 'prospection', 1, FALSE, 1, FALSE, 1, 'commentaire');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, recherche, type_recherche, collection, brule, periode, tamis, trouve_par, commentaire)
VALUES ('objet3', 2, 4, 4, 76, 4, 2, 1, 'fouille', 2, TRUE, 1, FALSE, 2, 'commentaire');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, recherche, type_recherche, collection, brule, periode, tamis, trouve_par, commentaire)
VALUES ('objet4', 2, 3, 4, 76, 4, 1, 1, ' ', 0, FALSE, 1, TRUE, 1, 'commentaire');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, recherche, type_recherche, collection, brule, periode, tamis, trouve_par, commentaire)
VALUES ('objet5', 2, 3, 4, 76, 4, 5, 2, 'fouille', 2, TRUE, 1, TRUE, 1, 'commentaire');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, recherche, type_recherche, collection, brule, periode, tamis, trouve_par, commentaire)
VALUES ('objet6', 2, 3, 4, 76, 4, 5, 2, 'prospection', 0, FALSE, 1, FALSE, 2, 'commentaire');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, recherche, type_recherche, collection, brule, periode, tamis, trouve_par, commentaire)
VALUES ('objet7', 2, 4, 4, 76, 4, 6, 1, ' ', 1, TRUE, 1, TRUE, 2, 'commentaire');

INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, recherche, type_recherche, collection, brule, periode, tamis, trouve_par, commentaire)
VALUES ('objet8', 1, 3, 4, 76, 4, 6, 1, 'prospection', 1, FALSE, 1, FALSE, 1, 'commentaire');

INSERT INTO charbon (datation, objet)
VALUES ('2/2/500', 5);

INSERT INTO charbon (datation, objet)
VALUES ('1/1/1', 6);

INSERT INTO galet (nom, objet, type)
VALUES ('galet1', 7, 1);

INSERT INTO galet (nom, objet, type)
VALUES ('galet2', 8, 2);

INSERT INTO os (objet, partie, type, taxon, animal, type_animal, forme, dissous, morsure, conservation, datation)
VALUES (4, 'cul', 'type1', 1, 'truie', 'ta soeur', 'ovale', FALSE, FALSE, 6, '12/23/90');

INSERT INTO os (objet, partie, type, taxon, animal, type_animal, forme, dissous, morsure, conservation, datation)
VALUES (3, 'tete', 'type2', 2, 'rat', 'ta mere', 'sinusoidale', TRUE, TRUE, 4, '1/1/1');

INSERT INTO silex (objet, provenance, couleur)
VALUES (2, 1, 'black');

INSERT INTO silex (objet, provenance, couleur)
VALUES (1, 2, 'yellow');

