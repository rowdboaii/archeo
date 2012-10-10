<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : patron.htm -->

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
					<form method = "post" action = "#">
						<p>
							<label>Pseudo</label> : <input type = "text" name = "pseudo" id = "pseudo" />
							<br />
							<label>Password</label> : <input type = "password" name = "mdp" id = "mdp" />
							<br />
							<input type = "submit" value = "connexion" />
						</p>
					</form>
				
				</div>
			</section>
			
			<footer>
				<!-- Pied de la page. -->
				<?php include("piedPage.php"); ?>
			</footer>

		</div>
	</body>
	
</html>
