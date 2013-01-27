<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : delete.php -->

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
		<title>SDelpression</title>
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
							<li><a href = "deletes/articleDel.php">Article</a></li>
							<li><a href = "deletes/carreDel.php">Carré</a></li>
							<li><a href = "deletes/collectionDel.php">Collection</a></li>
							<li><a href = "deletes/decapageDel.php">Décapage</a></li>
							<li><a href = "deletes/fouilleDel.php">Fouille</a></li>
							<li><a href = "deletes/gisementDel.php">Gisement</a></li>
							<li><a href = "deletes/lieuDel.php">Lieu</a></li>
							<li><a href = "deletes/locusDel.php">Locus</a></li>
							<li><a href = "deletes/objetDel.php">Objet</a></li>
							<li><a href = "deletes/personneDel.php">Personne</a></li>
							<li><a href = "deletes/prospectionDel.php">Prospection</a></li>
							<li><a href = "deletes/regionDel.php">Région</a></li>
							<li><a href = "deletes/siteDel.php">Site</a></li>
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
