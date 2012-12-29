<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : output.php -->

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
		<title>Output</title>
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

					<!-- Menu Pour l'affichage des tables. -->
					<p>
						<ul>
							<li><a href = "outputs/articleOut.php">Article</a></li>
							<li><a href = "outputs/carreOut.php">Carré</a></li>
							<li><a href = "outputs/charbonOut.php">Charbon</a></li>
							<li><a href = "outputs/collectionOut.php">Collection</a></li>
							<li><a href = "outputs/decapageOut.php">Décapage</a></li>
							<li><a href = "outputs/fouilleOut.php">Fouille</a></li>
							<li><a href = "outputs/galetOut.php">Galet</a></li>
							<li><a href = "outputs/gisementOut.php">Gisement</a></li>
							<li><a href = "outputs/lieuOut.php">Lieu</a></li>
							<li><a href = "outputs/locusOut.php">Locus</a></li>
							<li><a href = "outputs/objetOut.php">Objet</a></li>
							<li><a href = "outputs/osOut.php">Os</a></li>

							<!-- Vérification du type d'utilisateur. -->
							<?php if ($_SESSION['pseudo'] == 'sudo') { ?>
							<li><a href = "outputs/personneOut.php">Personne</a></li>
							<?php } ?>

							<li><a href = "outputs/prospectionOut.php">Prospection</a></li>
							<li><a href = "outputs/regionOut.php">Région</a></li>
							<li><a href = "outputs/silexOut.php">Silex</a></li>
							<li><a href = "outputs/siteOut.php">Site</a></li>
						</ul>
					</p>

				</div>
			</section>

			<footer>

				<!-- Pied de la page. -->
				<?php include('includes/piedPage.php'); ?>

			</footer>

		</div>
	</body>

</html>
