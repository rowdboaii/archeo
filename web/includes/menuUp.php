<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : menuUp.php -->

<!-- Vérification du type d'utilisateur. -->
<?php if ($_SESSION['pseudo'] == 'sudo') { ?>

<!-- Menu Pour l'affichage des tables. -->
<div id = "menuUp">
	<ul>
		<li><a href = "../updates/articleUp.php">Article</a></li>
		<li><a href = "../updates/carreUp.php">Carré</a></li>
		<li><a href = "../updates/collectionUp.php">Collection</a></li>
		<li><a href = "../updates/decapageUp.php">Décapage</a></li>
		<li><a href = "../updates/fouilleUp.php">Fouille</a></li>
		<li><a href = "../updates/gisementUp.php">Gisement</a></li>
		<li><a href = "../updates/lieuUp.php">Lieu</a></li>
		<li><a href = "../updates/locusUp.php">Locus</a></li>
		<li><a href = "../updates/objetUp.php">Objet</a></li>
		<li><a href = "../updates/personneUp.php">Personne</a></li>
		<li><a href = "../updates/prospectionUp.php">Prospection</a></li>
		<li><a href = "../updates/regionUp.php">Région</a></li>
		<li><a href = "../updates/siteUp.php">Site</a></li>
	</ul>
</div>

<?php } ?>

