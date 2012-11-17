<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : contact.php -->

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
		<title>Contacts</title>
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
					<?php include('includes/menuMain.php'); ?>
				
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

					<p>
						Xavier Muth<br />
						Géomètre<br />
						diplômé de l'INSA Strasbourg<br />
						<a href = "mailto:xavier.muth@truc.com">xavier.muth@truc.com</a><br />
						+33 (0) 651 515 151
					</p>
					
					<p>
						Antoine Hars<br />
						Étudiant en Informatique à l'UTC<br />
						<a href = "mailto:antoine.hars@truc.com">antoine.hars@truc.com</a><br />
						+33 (0) 651 515 151
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
