# Sujet : Projet de base de données pour des fouilles archéologiques.
# Auteurs : Xavier Muth & Antoine Hars
# Fichier : commit.sh

# Opérations pour commiter.
git add bdd/bdd.sql commit.sh delete.sh bdd/mcd_bdd_v1.png bdd/mcd_bdd_v2.png README.md apacheOn.sh web/index.php web/mainPage.php web/patron.php web/includes/menuIn.php web/includes/menuOut.php web/includes/piedPage.php web/inputs/articleIn.php web/inputs/carreIn.php web/inputs/charbonIn.php web/inputs/collectionIn.php web/inputs/decapageIn.php web/inputs/fouilleIn.php web/inputs/galetIn.php web/inputs/gisementIn.php web/inputs/lieuIn.php web/inputs/locusIn.php web/inputs/objetIn.php web/inputs/osIn.php web/inputs/personneIn.php web/inputs/prospectionIn.php web/inputs/regionIn.php web/inputs/silexIn.php web/inputs/siteIn.php web/styles/style.css web/includes/connexionBDD.php merge.sh web/outputs/articleOut.php web/outputs/regionOut.php web/outputs/siteOut.php web/outputs/locusOut.php web/outputs/personneOut.php web/outputs/collectionOut.php web/outputs/carreOut.php web/outputs/decapageOut.php web/outputs/fouilleOut.php web/outputs/lieuOut.php web/outputs/prospectionOut.php web/outputs/gisementOut.php web/outputs/objetOut.php web/outputs/silexOut.php web/outputs/osOut.php web/outputs/galetOut.php web/outputs/charbonOut.php web/input.php web/output.php web/includes/menuMain.php web/contact.php bdd/mcd_bdd.dia bdd/mcd_bdd_v3.png web/includes/menuDel.php web/includes/menuUp.php web/delete.php web/deconnect.php web/update.php web/inserts/articleInsert.php web/inserts/carreInsert.php web/inserts/charbonInsert.php web/inserts/collectionInsert.php web/inserts/decapageInsert.php web/inserts/fouilleInsert.php web/inserts/galetInsert.php web/inserts/gisementInsert.php web/inserts/lieuInsert.php web/inserts/locusInsert.php web/inserts/objetInsert.php web/inserts/osInsert.php web/inserts/personneInsert.php web/inserts/prospectionInsert.php web/inserts/regionInsert.php web/inserts/silexInsert.php web/inserts/siteInsert.php bdd/mcd_bdd_v4.png bdd/mcd_bdd_v5.png bdd/mcd_bdd_v6.png bdd/mcd_bdd_v7.png web/includes/menuParameter.php web/parameter.php web/parameters/pays.php web/parameters/langue.php web/parameters/siteType.php web/parameters/locusType.php web/parameters/nationalite.php web/parameters/fonction.php web/parameters/osTaxon.php web/parameters/galetType.php web/parameters/objetType.php web/parameters/periode.php web/parameters/objetNature.php web/inserts/paysInsert.php web/inserts/langueInsert.php web/inserts/siteTypeInsert.php web/inserts/locusTypeInsert.php web/inserts/nationaliteInsert.php web/inserts/fonctionInsert.php web/inserts/osTaxonInsert.php web/inserts/galetTypeInsert.php web/inserts/objetTypeInsert.php web/inserts/periodeInsert.php web/inserts/objetNatureInsert.php web/deletes/fonctionDel.php web/updates/fonctionUp.php web/deletes/galetTypeDel.php web/updates/galetTypeUp.php web/deletes/langueDel.php web/deletes/locusTypeDel.php web/deletes/nationaliteDel.php web/deletes/objetNatureDel.php web/deletes/objetTypeDel.php web/deletes/osTaxonDel.php web/deletes/paysDel.php web/deletes/periodeDel.php web/deletes/siteTypeDel.php web/updates/langueUp.php web/updates/locusTypeUp.php web/updates/nationaliteUp.php web/updates/objetNatureUp.php web/updates/objetTypeUp.php web/updates/osTaxonUp.php web/updates/paysUp.php web/updates/periodeUp.php web/updates/siteTypeUp.php web/updates/articleUp.php web/updates/carreUp.php web/updates/charbonUp.php web/updates/collectionUp.php web/updates/decapageUp.php web/updates/fouilleUp.php web/updates/galetUp.php web/updates/gisementUp.php web/updates/lieuUp.php web/updates/locusUp.php &&
git commit -m 'Ajout Update de Locus.' &&
git push origin master

#	apacheOn.sh
#	commit.sh
# delete.sh
# merge.sh
# README.md

#	bdd/bdd.sql
# bdd/mcd_bdd.dia
#	bdd/mcd_bdd_v1.png
# bdd/mcd_bdd_v2.png
# bdd/mcd_bdd_v3.png
# bdd/mcd_bdd_v4.png
# bdd/mcd_bdd_v5.png
# bdd/mcd_bdd_v6.png
# bdd/mcd_bdd_v7.png

# web/contact.php
# web/delete.php
# web/deconnect.php
#	web/index.php
# web/input.php
#	web/mainPage.php
# web/output.php
# web/parameter.php
#	web/patron.php
# web/update.php

# web/includes/connexionBDD.php
# web/includes/menuDel.php
#	web/includes/menuIn.php
# web/includes/menuMain.php
#	web/includes/menuOut.php
# web/includes/menuParameter.php
# web/includes/menuUp.php
#	web/includes/piedPage.php

# web/deletes/fonctionDel.php
# web/deletes/galetTypeDel.php
# web/deletes/langueDel.php
# web/deletes/locusTypeDel.php
# web/deletes/nationaliteDel.php
# web/deletes/objetNatureDel.php
# web/deletes/objetTypeDel.php
# web/deletes/osTaxonDel.php
# web/deletes/paysDel.php
# web/deletes/periodeDel.php
# web/deletes/siteTypeDel.php

#################################################### À AJOUTER #########################################################################
# web/deletes/articleDel.php
# web/deletes/carreDel.php
# web/deletes/charbonDel.php
# web/deletes/collectionDel.php
# web/deletes/decapageDel.php
# web/deletes/fouilleDel.php
# web/deletes/galetDel.php
# web/deletes/gisementDel.php
# web/deletes/lieuDel.php
# web/deletes/locusDel.php
# web/deletes/objetDel.php
# web/deletes/osDel.php
# web/deletes/personneDel.php
# web/deletes/prospectionDel.php
# web/deletes/regionDel.php
# web/deletes/silexDel.php
# web/deletes/siteDel.php

# web/exec/articleUpdate.php
# web/exec/carreUpdate.php
# web/exec/charbonUpdate.php
# web/exec/collectionUpdate.php
# web/exec/decapageUpdate.php
# web/exec/fouilleUpdate.php
# web/exec/galetUpdate.php
# web/exec/gisementUpdate.php
# web/exec/lieuUpdate.php
# web/exec/locusUpdate.php
# web/exec/objetUpdate.php
# web/exec/osUpdate.php
# web/exec/personneUpdate.php
# web/exec/prospectionUpdate.php
# web/exec/regionUpdate.php
# web/exec/silexUpdate.php
# web/exec/siteUpdate.php

# web/exec/articleDelete.php
# web/exec/carreDelete.php
# web/exec/charbonDelete.php
# web/exec/collectionDelete.php
# web/exec/decapageDelete.php
# web/exec/fouilleDelete.php
# web/exec/galetDelete.php
# web/exec/gisementDelete.php
# web/exec/lieuDelete.php
# web/exec/locusDelete.php
# web/exec/objetDelete.php
# web/exec/osDelete.php
# web/exec/personneDelete.php
# web/exec/prospectionDelete.php
# web/exec/regionDelete.php
# web/exec/silexDelete.php
# web/exec/siteDelete.php
########################################################################################################################################


#	web/inputs/articleIn.php
#	web/inputs/carreIn.php
#	web/inputs/charbonIn.php
#	web/inputs/collectionIn.php
#	web/inputs/decapageIn.php
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

# web/inserts/articleInsert.php
# web/inserts/carreInsert.php
# web/inserts/charbonInsert.php
# web/inserts/collectionInsert.php
# web/inserts/decapageInsert.php
# web/inserts/fonctionInsert.php
# web/inserts/fouilleInsert.php
# web/inserts/galetInsert.php
# web/inserts/galetTypeInsert.php
# web/inserts/gisementInsert.php
# web/inserts/langueInsert.php
# web/inserts/lieuInsert.php
# web/inserts/locusInsert.php
# web/inserts/locusTypeInsert.php
# web/inserts/nationaliteInsert.php
# web/inserts/objetInsert.php
# web/inserts/objetNatureInsert.php
# web/inserts/objetTypeInsert.php
# web/inserts/osInsert.php
# web/inserts/osTaxonInsert.php
# web/inserts/paysInsert.php
# web/inserts/periodeInsert.php
# web/inserts/personneInsert.php
# web/inserts/prospectionInsert.php
# web/inserts/regionInsert.php
# web/inserts/silexInsert.php
# web/inserts/siteInsert.php
# web/inserts/siteTypeInsert.php

# web/outputs/articleOut.php
# web/outputs/carreOut.php
# web/outputs/charbonOut.php
# web/outputs/collectionOut.php
# web/outputs/decapageOut.php
# web/outputs/fouilleOut.php
# web/outputs/galetOut.php
# web/outputs/gisementOut.php
# web/outputs/lieuOut.php
# web/outputs/locusOut.php
# web/outputs/objetOut.php
# web/outputs/osOut.php
# web/outputs/personneOut.php
# web/outputs/prospectionOut.php
# web/outputs/regionOut.php
# web/outputs/silexOut.php
# web/outputs/siteOut.php

# web/parameters/fonction.php
# web/parameters/galetType.php
# web/parameters/langue.php
# web/parameters/locusType.php
# web/parameters/nationalite.php
# web/parameters/objetNature.php
# web/parameters/objetType.php
# web/parameters/osTaxon.php
# web/parameters/pays.php
# web/parameters/periode.php
# web/parameters/siteType.php

# web/updates/fonctionUp.php
# web/updates/galetTypeUp.php
# web/updates/langueUp.php
# web/updates/locusTypeUp.php
# web/updates/nationaliteUp.php
# web/updates/objetNatureUp.php
# web/updates/objetTypeUp.php
# web/updates/osTaxonUp.php
# web/updates/paysUp.php
# web/updates/periodeUp.php
# web/updates/siteTypeUp.php

# web/updates/articleUp.php
# web/updates/carreUp.php
# web/updates/charbonUp.php
# web/updates/collectionUp.php
# web/updates/decapageUp.php
# web/updates/fouilleUp.php
# web/updates/galetUp.php
# web/updates/gisementUp.php
# web/updates/lieuUp.php
# web/updates/locusUp.php

#################################################### À AJOUTER #########################################################################
# web/updates/objetUp.php
# web/updates/osUp.php
# web/updates/personneUp.php
# web/updates/prospectionUp.php
# web/updates/regionUp.php
# web/updates/silexUp.php
# web/updates/siteUp.php
########################################################################################################################################

#	web/styles/style.css

