<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : decapageIn.php -->

<?php
	session_start();
?>

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
		<title>Décapage</title>
	</head>
	<body>
	  <!-- Corps de la page. -->
		<div id="">

			<header>
				<!-- Header de la page. -->
				<div id="">

				</div>
			</header>

			<nav>
				<!-- Principaux liens de navigation de la page. -->
				<div id="">
				
					<!-- Menu principal. -->
					<?php include('../includes/menuMain.php'); ?>

				</div>
			</nav>

			<aside>
				<!-- Menu latéral spécifique au lien visité. -->
				<div id="">
				
					<!-- Menu pour les inputs. -->
					<?php include('../includes/menuIn.php'); ?>

				</div>
			</aside>

			<?php if ($_SESSION['pseudo'] == 'sudo') { ?>
			<section>
				<!-- Section de page. -->
				<div id="">

					<p>
						<!-- Formulaire pour un Décapage. -->
						</p><form method="post" action="http://cloud.github.com/downloads/antoine-hars/bdd_xavier/decapageIn.htm#">
							<p>
								<label for="id">Identifiant</label> : <input type="text" name="id" id="id">
								<label for="locus">Locus</label> : 
								<select name="locus" id="locus">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</p>
						</form>
					<p></p>

				</div>
			</section>
			<?php } ?>

			<footer>
			
				<!-- Pied de la page. -->
				<?php include('../includes/piedPage.php'); ?>
			
			</footer>

		</div>
	</body>

</html>
