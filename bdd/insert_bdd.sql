/* Sujet : Projet de base de données pour des fouilles archéologiques.
 * Auteurs : Xavier Muth & Antoine Hars
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

INSERT INTO personne (nom, prenom, nationalite, fonction)
VALUES ('bob', 'patrick', 2, 2);

INSERT INTO personne (nom, prenom, nationalite, fonction)
VALUES ('muth', 'xavier', 1, 1);

INSERT INTO region (nom, pays)
VALUES ('region1', 1);

INSERT INTO region (nom, pays)
VALUES ('region2', 2);

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

INSERT INTO article (titre, auteur, mot_cle, annee, revue, langue, sujet, type_sujet)
VALUES ('titre1', 2, 'mot1 mot2', '01/12/2012', 'revue1', 4, 1, 'site');

INSERT INTO article (titre, auteur, mot_cle, annee, revue, langue, sujet, type_sujet)
VALUES ('titre2', 1, 'mot4', '23/01/2010', 'revue3', 1, 2, 'region');

INSERT INTO article (titre, auteur, mot_cle, annee, revue, langue, sujet, type_sujet)
VALUES ('titre3', 2, 'mot5', '02/01/2010', 'rev&',3, 1, 'site');

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
VALUES (4, 'cul', 'type1', 1, 'truie', 'ta soeur', 'ovale', FALSE, FALSE, 6, '23/12/90');

INSERT INTO os (objet, partie, type, taxon, animal, type_animal, forme, dissous, morsure, conservation, datation)
VALUES (3, 'tete', 'type2', 2, 'rat', 'ta mere', 'sinusoidale', TRUE, TRUE, 4, '1/1/1');

INSERT INTO silex (objet, provenance, couleur)
VALUES (2, 1, 'black');

INSERT INTO silex (objet, provenance, couleur)
VALUES (1, 2, 'yellow');

