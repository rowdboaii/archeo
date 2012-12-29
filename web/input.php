<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : input.php -->

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
		<title>Input</title>
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

					<?php if ($_SESSION['pseudo'] == 'sudo') { ?>

					<!-- Menu Pour les insertions de la page. -->
					<p>
						<ul>
							<li><a href = "inputs/articleIn.php">Article</a></li>
							<li><a href = "inputs/carreIn.php">Carré</a></li>
							<li><a href = "inputs/charbonIn.php">Charbon</a></li>
							<li><a href = "inputs/collectionIn.php">Collection</a></li>
							<li><a href = "inputs/decapageIn.php">Décapage</a></li>
							<li><a href = "inputs/fouilleIn.php">Fouille</a></li>
							<li><a href = "inputs/galetIn.php">Galet</a></li>
							<li><a href = "inputs/gisementIn.php">Gisement</a></li>
							<li><a href = "inputs/lieuIn.php">Lieu</a></li>
							<li><a href = "inputs/locusIn.php">Locus</a></li>
							<li><a href = "inputs/objetIn.php">Objet</a></li>
							<li><a href = "inputs/osIn.php">Os</a></li>
							<li><a href = "inputs/personneIn.php">Personne</a></li>
							<li><a href = "inputs/prospectionIn.php">Prospection</a></li>
							<li><a href = "inputs/regionIn.php">Région</a></li>
							<li><a href = "inputs/silexIn.php">Silex</a></li>
							<li><a href = "inputs/siteIn.php">Site</a></li>
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
