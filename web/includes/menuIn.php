<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : menuIn.php -->

<!-- Vérification du type d'utilisateur. -->
<?php if ($_SESSION['pseudo'] == 'sudo') { ?>

<!-- Menu Pour les insertions de la page. -->
<div id = "menuIn">
	<ul>
		<li><a href = "../inputs/articleIn.php">Article</a></li>
		<li><a href = "../inputs/carreIn.php">Carré</a></li>
		<li><a href = "../inputs/charbonIn.php">Charbon</a></li>
		<li><a href = "../inputs/collectionIn.php">Collection</a></li>
		<li><a href = "../inputs/decapageIn.php">Décapage</a></li>
		<li><a href = "../inputs/fouilleIn.php">Fouille</a></li>
		<li><a href = "../inputs/galetIn.php">Galet</a></li>
		<li><a href = "../inputs/gisementIn.php">Gisement</a></li>
		<li><a href = "../inputs/lieuIn.php">Lieu</a></li>
		<li><a href = "../inputs/locusIn.php">Locus</a></li>
		<li><a href = "../inputs/objetIn.php">Objet</a></li>
		<li><a href = "../inputs/osIn.php">Os</a></li>
		<li><a href = "../inputs/personneIn.php">Personne</a></li>
		<li><a href = "../inputs/prospectionIn.php">Prospection</a></li>
		<li><a href = "../inputs/regionIn.php">Région</a></li>
		<li><a href = "../inputs/silexIn.php">Silex</a></li>
		<li><a href = "../inputs/siteIn.php">Site</a></li>
	</ul>
</div>

<?php } ?>

