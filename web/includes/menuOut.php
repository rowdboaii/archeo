<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : menuOut.php -->

<!-- Menu Pour l'affichage des tables. -->
<div id = "menuOut">
	<ul>
		<li><a href = "../outputs/regionOut.php">Région</a></li>
		<li><a href = "../outputs/lieuOut.php">Lieu</a></li>
		<li><a href = "../outputs/siteOut.php">Site</a></li>
		<li><a href = "../outputs/locusOut.php">Locus</a></li>
		<li><a href = "../outputs/prospectionOut.php">Prospection</a></li>
		<li><a href = "../outputs/articleOut.php">Article</a></li>
		<li><a href = "../outputs/gisementOut.php">Gisement</a></li>
		<li><a href = "../outputs/decapageOut.php">Décapage</a></li>
		<li><a href = "../outputs/carreOut.php">Carré</a></li>
		<li><a href = "../outputs/fouilleOut.php">Fouille</a></li>
		<?php if ($_SESSION['pseudo'] == 'sudo') { ?>
		<li><a href = "../outputs/personneOut.php">Personne</a></li>
		<?php } ?>
		<li><a href = "../outputs/collectionOut.php">Collection</a></li>
		<li><a href = "../outputs/objetOut.php">Objet</a></li>
		<li><a href = "../outputs/silexOut.php">Silex</a></li>
		<li><a href = "../outputs/osOut.php">Os</a></li>
		<li><a href = "../outputs/galetOut.php">Galet</a></li>
		<li><a href = "../outputs/charbonOut.php">Charbon</a></li>
	</ul>
</div>
