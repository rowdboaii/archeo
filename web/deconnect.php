<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : deconnect.php -->

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
		<title>Déconnexion</title>
	</head>

	<body>
	  <!-- Corps de la page. -->
		<div id = "">

			<header>
				<!-- Header de la page. -->
				<div id = "">

				</div>
			</header>


			<section>
				<!-- Section de page. -->
				<div id = "">

					<h2>Déconnexion</h2>

					<!-- Destruction des données de la session. -->
					<?php session_destroy(); ?>

					<p>
						<br />
						<a href = "index.php">Connexion</a>
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
