<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : index.php -->

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
		<title>Login</title>
	</head>

	<body>
		<!-- Corps de la page. -->
		<div id = "bodyLogin">

			<header>
				<!-- Header de la page. -->
				<div id = "headerLogin">

				</div>
			</header>

			<section>
				<!-- Section de page. -->
				<div id = "sectionLogin">

					<!-- Formulaire pour le login et le mdp. -->
					<form class = "login" method = "post" action = "mainPage.php">
						<h1>Login</h1>
						<p>
							<label for = "pseudo">Pseudo</label>
							<input type = "text" name = "pseudo" id = "pseudo" placeholder = "Username" required />
						</p>
						<p>
							<label for = "mdp">Password</label>
							<input type = "password" name = "mdp" id = "mdp" placeholder = "Password" required />
						</p>
						<p>
							<input type = "submit" value = "Continue" />
						</p>
					</form>

				</div>
			</section>

			<footer>

				<!-- Pied de la page. -->
				<?php include('includes/piedPage.php'); ?>

			</footer>

		</div>
	</body>

</html>
