<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : menuParameter.php -->

<!-- Vérification du type d'utilisateur. -->
<?php if ($_SESSION['pseudo'] == 'sudo') { ?>

<!-- Menu Pour les Paramètres. -->
<div id = "menuParameter">
	<ul>
		<li><a href = "../parameters/fonction.php">Fonctions</a></li>
		<li><a href = "../parameters/galetType.php">Galet Types</a></li>
		<li><a href = "../parameters/langue.php">Langues</a></li>
		<li><a href = "../parameters/locusType.php">Locus Types</a></li>
		<li><a href = "../parameters/nationalite.php">Nationalités</a></li>
		<li><a href = "../parameters/objetNature.php">Objet Natures</a></li>
		<li><a href = "../parameters/objetType.php">Objet Types</a></li>
		<li><a href = "../parameters/osTaxon.php">Os Taxons</a></li>
		<li><a href = "../parameters/pays.php">Pays</a></li>
		<li><a href = "../parameters/periode.php">Périodes</a></li>
		<li><a href = "../parameters/siteType.php">Site Types</a></li>
	</ul>
</div>

<?php } ?>
