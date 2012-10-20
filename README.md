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
- Insertion de champs dans les tables.
- Protection du site par Login.
- Affichage complet des tables.
- Liens entre les pages du site.
- Menus pour accéder aux pages du site.


V2:
- La création en cascade d'un Objet et de ses hérités.
- Affichage d'une table en fonction d'un critère.


V3:
- CSS pour avoir des blocs faciles à manipuler.
- CSS plus graphique avec le positionnement des blocs entre eux.


V4:
- Ajout de toutes les énumérations.
- Création des triggers pour les identifiants des champs des tables.
- Sécuriser l'accès à la base de données en utilisant des RegExp.
- Voir pour enregistrer les données entrées dans des cookies si besoin est pour ne pas à avoir à les retranscrire par la suite en cas d'oubli.
- Ajout des nouvelles données automatiquement dans les select des formulaires.
