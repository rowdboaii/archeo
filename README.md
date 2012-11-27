Auteurs : Xavier Mutt & Antoine Hars
====================================
Description: bdd pour des fouilles.
====================================

Sujet:
- Un site contient des locus.
- Des articles publiés sont en relation avec des sites ou des régions ou des locus et sont écrits pas des personnes.
- Chaque locus contient des objets.
- Un site a des lieux ou des locus.
- Un lieu n'est pas en relation avec une fouille et un lieu n'a pas forcément d'objet.
- Un objet trouvé au tami n'a pas de côte (x, y, z) et vice versa.
- Un locus contient des carrés qui contiennent des décapages.
- Un décapage est associé à une personne.
- Un objet peut être donné par une autre personne qui possédait une collection.


V1:
- Création de la base de données. (DONE)
- Création du CD de la base de données. (DONE)
- Insertion basique de champs dans les tables. (DONE)
- Protection du site par Login avec gestion d'une session. (DONE)
- Affichage complet des tables. (DONE)
- Liens entre les pages du site. (DONE)
- Menus pour accéder aux pages du site. (DONE)
- Ajout de paramètres contenant toutes les valeurs secondaires de la base. (DONE)
- Identification unique des champs des tables de la base. (DONE)
- Récupération des valeurs des listes des formulaires. (DONE)
- Ajout d'un super utilisateur pour modifier les données de la base. (DONE)
- Ajout d'un utilisateur normal avec accès à la lecture seule. (DONE)
- Modification des valeurs des champs des tables de la base.
- Suppression des champs des tables de la base. (DONE)


V2:
- CSS display bloc pour manipuler facilement les éléments des pages.
- CSS réalisation esthétique des pages du site.
- Gestion plus avancée de la modification des textarea.
- Ajout gestion d'upload de fichier dans le champ Fiche d'Objet.
- Gestion plus avancée de la modification des booleans.
- Ajout possibilité de choix du sujet d'un article (Locus ou Site ou Région).


V3:
- Sécuriser le transit de données en utilisant des RegExp.
- Ajout recherche d'articles en fonction de mots clé.


V4:
- Création en cascade.
- Modification en cascade.
- Suppression en cascade.
- Sauvegarde de la base sur un support externe.
- Restauration de la base si besoin est à partir du support externe.
