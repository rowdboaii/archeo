<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : gisementIn.htm -->

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
		<title>Gisement</title>
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
					<?php include('../includes/menuMain.php'); ?>
				
				</div>
			</nav>
			
			<aside>
				<!-- Menu latéral spécifique au lien visité. -->
				<div id = "">
				
					<!-- Menu pour les inputs. -->
					<?php include('../includes/menuIn.php'); ?>
				
				</div>
			</aside>

			<section>
				<!-- Section de page. -->
				<div id = "">

					<p>
						<!-- Formulaire pour un Gisement. -->
						<form method = "post" action = "#">
							<p>
								<label for = "region">Region</label> : 
								<select name = "region" id = "region">
									<option value = "1">1</option>
									<option value = "2">2</option>
									<option value = "3">3</option>
									<option value = "4">4</option>
									<option value = "5">5</option>
								</select><br />
								<label for = "nord">Position Nord</label> : <input type = "text" name = "nord" id = "nord" /><br />
								<label for = "est">Position Est</label> : <input type = "text" name = "est" id = "est" /><br />
								<label for = "altitude">Altitude</label> : <input type = "text" name = "altitude" id = "altitude" /><br />
								<label for = "commentaire">Commentaire</label> :<br />
								<textarea name = "commentaire" id = "commentaire" rows = "5" cols = "40"></textarea><br />
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>
	
				</div>
			</section>

			<footer>
				
				<!-- Pied de la page. -->
				<?php include('../includes/piedPage.php'); ?>

			</footer>

		</div>
	</body>

</html>
