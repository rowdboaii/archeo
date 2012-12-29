<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : parameter.php -->

<!-- Démarrage de la session pour les identifiants. -->
<?php session_start(); ?>

<!DOCTYPE html>
<html>

	<head>
		<!-- En-tête de la page. -->
		<meta charset = "utf-8" />
		<link rel = "stylesheet" href = "styles/style.css" />
		<!-- Dans le cas où le navigateur est une version antérieure à IE9 -->
		<!--[if lt IE9]>
			<script src = "http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<title></title>
	</head>

	<body>
	  <!-- Corps de la page. -->
		<div id = "">

			<header>
				<!-- Header de la page. -->
				<div id = "">

				</div>
			</header>

			<nav>
				<!-- Principaux liens de navigation de la page. -->
				<div id = "">

					<!-- Menu principal. -->
					<?php include('includes/menuMain1.php'); ?>

				</div>
			</nav>

			<aside>
				<!-- Menu latéral spécifique au lien visité. -->
				<div id = "">

				</div>
			</aside>

			<section>
				<!-- Section de page. -->
				<div id = "">

					<!-- Vérification du type d'utilisateur. -->
					<?php if ($_SESSION['pseudo'] == 'sudo') { ?>

					<!-- Menu Pour les Paramètres. -->
					<p>
						<ul>
							<li><a href = "parameters/fonction.php">Fonctions</a></li>
							<li><a href = "parameters/galetType.php">Galet Types</a></li>
							<li><a href = "parameters/langue.php">Langues</a></li>
							<li><a href = "parameters/locusType.php">Locus Types</a></li>
							<li><a href = "parameters/nationalite.php">Nationalités</a></li>
							<li><a href = "parameters/objetNature.php">Objet Natures</a></li>
							<li><a href = "parameters/objetType.php">Objet Types</a></li>
							<li><a href = "parameters/osTaxon.php">Os Taxons</a></li>
							<li><a href = "parameters/pays.php">Pays</a></li>
							<li><a href = "parameters/periode.php">Périodes</a></li>
							<li><a href = "parameters/siteType.php">Site Types</a></li>
						</ul>
					</p>

					<?php } ?>

				</div>
			</section>

			<footer>

				<!-- Pied de la page. -->
				<?php include('includes/piedPage.php'); ?>

			</footer>

		</div>
	</body>

</html>
