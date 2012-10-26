<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : carreIn.php -->

<!-- Démarrage de la session pour les identifiants. -->
<?php	session_start(); ?>

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
		<title>Carré</title>
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
						<!-- Formulaire pour un Carré. -->
						</p><form method="post" action="../inserts/carreInsert.php">
							<p>
								<label for="id">Identifiant</label> : <input type="text" name="id" id="id"><br>
								<label for="decapage">Décapage</label> : 
								<select name="decapage" id="decapage">
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
