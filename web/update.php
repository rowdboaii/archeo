<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : update.php -->

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
		<title>Update</title>
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

					<!-- Menu Pour l'affichage des tables. -->
					<p>
						<ul>
							<li><a href = "updates/articleUp.php">Article</a></li>
							<li><a href = "updates/carreUp.php">Carré</a></li>
							<li><a href = "updates/collectionUp.php">Collection</a></li>
							<li><a href = "updates/decapageUp.php">Décapage</a></li>
							<li><a href = "updates/fouilleUp.php">Fouille</a></li>
							<li><a href = "updates/gisementUp.php">Gisement</a></li>
							<li><a href = "updates/lieuUp.php">Lieu</a></li>
							<li><a href = "updates/locusUp.php">Locus</a></li>
							<li><a href = "updates/objetUp.php">Objet</a></li>
							<li><a href = "updates/personneUp.php">Personne</a></li>
							<li><a href = "updates/prospectionUp.php">Prospection</a></li>
							<li><a href = "updates/regionUp.php">Région</a></li>
							<li><a href = "updates/siteUp.php">Site</a></li>
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
