# Sujet : Projet de base de données pour des fouilles archéologiques.
# Auteurs : Xavier Muth & Antoine Hars
# Fichier : commit.sh

# Opérations pour commiter.
git fetch upstream &&
git merge upstream/master &&
git add README.md mcd_bdd_v1.png bdd.sql commit.sh delete.sh xamppOn.sh xamppOff.sh html/index.php html/mainPage.php html/patron.php html/includes/menuIn.php html/includes/menuOut.php html/includes/piedPage.php html/inputs/articleIn.php html/inputs/carreIn.php html/inputs/charbonIn.php html/inputs/collectionIn.php html/inputs/decapageIn.php html/inputs/form.htm html/inputs/fouilleIn.php html/inputs/galetIn.php html/inputs/gisementIn.php html/inputs/lieuIn.php html/inputs/locusIn.php html/inputs/objetIn.php html/inputs/osIn.php html/inputs/personneIn.php html/inputs/prospectionIn.php html/inputs/regionIn.php html/inputs/silexIn.php html/inputs/siteIn.php html/styles/style.css &&
git commit -m 'Ajout Script pour les suppressions.' &&
git push origin master

# README.md
#	mcd_bdd_v1.png
#	bdd.sql
#	commit.sh
# delete.sh
#	xamppOn.sh
#	xamppOff.sh
#	html/index.php
#	html/mainPage.php
#	html/patron.php
#	html/includes/menuIn.php
#	html/includes/menuOut.php
#	html/includes/piedPage.php
#	html/inputs/articleIn.php
#	html/inputs/carreIn.php
#	html/inputs/charbonIn.php
#	html/inputs/collectionIn.php
#	html/inputs/decapageIn.php
#	html/inputs/form.htm
#	html/inputs/fouilleIn.php
#	html/inputs/galetIn.php
#	html/inputs/gisementIn.php
#	html/inputs/lieuIn.php
#	html/inputs/locusIn.php
#	html/inputs/objetIn.php
#	html/inputs/osIn.php
#	html/inputs/personneIn.php
#	html/inputs/prospectionIn.php
#	html/inputs/regionIn.php
#	html/inputs/silexIn.php
#	html/inputs/siteIn.php
#	html/styles/style.css
	
