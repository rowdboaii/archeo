<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : menuDel.php -->

<!-- Vérification du type d'utilisateur. -->
<?php if ($_SESSION['pseudo'] == 'sudo') { ?>

<!-- Menu Pour l'affichage des tables. -->
<div id = "menuDel">
	<ul>
		<li><a href = "../deletes/articleDel.php">Article</a></li>
		<li><a href = "../deletes/carreDel.php">Carré</a></li>
		<li><a href = "../deletes/charbonDel.php">Charbon</a></li>
		<li><a href = "../deletes/collectionDel.php">Collection</a></li>
		<li><a href = "../deletes/decapageDel.php">Décapage</a></li>
		<li><a href = "../deletes/fouilleDel.php">Fouille</a></li>
		<li><a href = "../deletes/galetDel.php">Galet</a></li>
		<li><a href = "../deletes/gisementDel.php">Gisement</a></li>
		<li><a href = "../deletes/lieuDel.php">Lieu</a></li>
		<li><a href = "../deletes/locusDel.php">Locus</a></li>
		<li><a href = "../deletes/objetDel.php">Objet</a></li>
		<li><a href = "../deletes/osDel.php">Os</a></li>
		<li><a href = "../deletes/personneDel.php">Personne</a></li>
		<li><a href = "../deletes/prospectionDel.php">Prospection</a></li>
		<li><a href = "../deletes/regionDel.php">Région</a></li>
		<li><a href = "../deletes/silexDel.php">Silex</a></li>
		<li><a href = "../deletes/siteDel.php">Site</a></li>
	</ul>
</div>

<?php } ?>

