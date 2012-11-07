# Sujet : Projet de base de données pour des fouilles archéologiques.
# Auteurs : Xavier Muth & Antoine Hars
# Fichier : delete.sh

git rm web/deletes/fonctionDel.php web/deletes/galetTypeDel.php web/deletes/langueDel.php web/deletes/locusTypeDel.php web/deletes/nationaliteDel.php web/deletes/objetNatureDel.php web/deletes/objetTypeDel.php web/deletes/osTaxonDel.php web/deletes/paysDel.php web/deletes/periodeDel.php web/deletes/siteTypeDel.php &&
git commit -m 'Réorganisation du code.' &&
git push origin master

