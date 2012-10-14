# Sujet : Projet de base de données pour des fouilles archéologiques.
# Auteurs : Xavier Muth & Antoine Hars
# Fichier : commit.sh

# Opérations pour commiter.
git fetch upstream &&
git merge upstream/master &&
git add bdd.sql commit.sh delete.sh mcd_bdd_v1.png mcd_bdd_v2.png README.md xamppOn.sh xamppOff.sh web/index.php web/mainPage.php web/patron.php web/test.php web/includes/menuIn.php web/includes/menuOut.php web/includes/piedPage.php web/inputs/articleIn.php web/inputs/carreIn.php web/inputs/charbonIn.php web/inputs/collectionIn.php web/inputs/decapageIn.php web/inputs/form.htm web/inputs/fouilleIn.php web/inputs/galetIn.php web/inputs/gisementIn.php web/inputs/lieuIn.php web/inputs/locusIn.php web/inputs/objetIn.php web/inputs/osIn.php web/inputs/personneIn.php web/inputs/prospectionIn.php web/inputs/regionIn.php web/inputs/silexIn.php web/inputs/siteIn.php web/styles/style.css &&
git commit -m 'Modification du MCD.' &&
git push origin master

#	bdd.sql
#	commit.sh
# delete.sh
#	mcd_bdd_v1.png
# mcd_bdd_v2.png
# README.md
#	xamppOn.sh
#	xamppOff.sh

#	web/index.php
#	web/mainPage.php
#	web/patron.php
# web/test.php

#	web/includes/menuIn.php
#	web/includes/menuOut.php
#	web/includes/piedPage.php

#	web/inputs/articleIn.php
#	web/inputs/carreIn.php
#	web/inputs/charbonIn.php
#	web/inputs/collectionIn.php
#	web/inputs/decapageIn.php
#	web/inputs/form.htm
#	web/inputs/fouilleIn.php
#	web/inputs/galetIn.php
#	web/inputs/gisementIn.php
#	web/inputs/lieuIn.php
#	web/inputs/locusIn.php
#	web/inputs/objetIn.php
#	web/inputs/osIn.php
#	web/inputs/personneIn.php
#	web/inputs/prospectionIn.php
#	web/inputs/regionIn.php
#	web/inputs/silexIn.php
#	web/inputs/siteIn.php

#	web/styles/style.css
	
