<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : mainPage.php -->

<!-- Démarrage de la session pour les identifiants. -->
<?php session_start(); ?>

<!DOCTYPE html>
<html>

	<head>
		<!-- En-tête de la page. -->
		<meta charset = "utf-8" />
		<link rel = "stylesheet" href = "style.css" />
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

			<?php
				/* Récupération des identifiants de connexion s'il y en a. */
				if (isset($_POST['pseudo']) AND isset($_POST['mdp']))
				{
					$_SESSION['pseudo'] = $_POST['pseudo'];
					$_SESSION['mdp'] = $_POST['mdp'];
				}
				
				/* S'il n'y a pas d'identifiants. */
				if (isset($_SESSION['pseudo']) AND isset($_SESSION['mdp']))
				{
					/* Si les identifiants sont corrects. */
					if (($_SESSION['pseudo'] == "sudo" AND $_SESSION['mdp'] == "password") OR ($_SESSION['pseudo'] == "user" AND $_SESSION['mdp'] == "password"))
					{
			?>			
				
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

					<h2>Site créé dans le cadre de fouilles archéologiques.</h2>
					<p>
						Page Principale.
					</p>

				</div>
			</section>
						
			<?php
					}
					else
					{
						echo 'Mauvais login et mdp.';
						echo '<br /><br /><a href = "index.php">Page de connexion</a>';
					}
				}
				else
				{
					echo 'Absence de login et de mdp.';
					echo '<br /><br /><a href = "index.php">Page de connexion</a>';
				}
			?>
			
			<footer>
			
				<!-- Pied de la page. -->
				<?php include('includes/piedPage.php'); ?>				
			
			</footer>

		</div>
	</body>

</html>
