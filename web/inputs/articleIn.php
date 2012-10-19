<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : articleIn.htm -->

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
		<title>Article</title>
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
						<!-- Formulaire pour un Article. -->
						<form method = "post" action = "#">
							<p>
								<label for = "titre">Titre</label> : <input type = "text" name = "titre" id = "titre" /><br />
								<label for = "auteur">Auteur</label> : 
								<select name = "auteur" id = "auteur">
									<option value = "1">1</option>
									<option value = "2">2</option>
									<option value = "3">3</option>
									<option value = "4">4</option>
									<option value = "5">5</option>
								</select><br />
								<label for = "revue">Revue</label> : <input type = "text" name = "revue" id = "revue" /><br />
								<label for = "sujet">Sujet</label> : 
								<select name = "sujet" id = "sujet">
									<option value = "1">1</option>
									<option value = "2">2</option>
									<option value = "3">3</option>
									<option value = "4">4</option>
									<option value = "5">5</option>
								</select><br />
								<label for = "annee">Année</label> : <input type = "text" name = "annee" id = "annee" /><br />
								<label for = "langue">Langue</label> : 
								<select name = "langue" id = "langue">
									<option value = "1">1</option>
									<option value = "2">2</option>
									<option value = "3">3</option>
									<option value = "4">4</option>
									<option value = "5">5</option>
								</select><br />
								<label for = "mots_cle">Mots clé</label> :<br />
								<textarea name = "mots_cle" id = "mots_cle" rows = "5" cols = "40"></textarea><br />
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>
	
				</div>
			</section>

			<footer>
				<!-- Pied de la page. -->
				<?php include("piedPage.php"); ?>
			</footer>

		</div>
	</body>

</html>