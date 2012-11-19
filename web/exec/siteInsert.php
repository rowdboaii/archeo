<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : siteInsert.php -->

<!-- Démarrage de la session pour les identifiants. -->
<?php session_start(); ?>

<!DOCTYPE html>
<html>

	<head>
		<!-- En-tête de la page. -->
		<meta charset = "utf-8" />
		<link rel = "stylesheet" href = "../styles/style.css" />
		<!-- Dans le cas où le navigateur est une version antérieure à IE9 -->
		<!--[if lt IE9]>
			<script src = "http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<title>SiteInsert</title>
	</head>

	<body>
	  <!-- Corps de la page. -->
		<div id = "">

			<!-- Connexion à la base de données. -->
			<?php include('../includes/connexionBDD.php'); ?>

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
	
					<?php
						$query = $bdd->prepare('INSERT INTO site (nom, region, position_nord, position_est, altitude, trouve_par, fouille_par, type, commentaire)
									VALUES (:nom, :region, :position_nord, :position_est, :altitude, :trouve_par, fouille_par, type, :commentaire)');
						$query->execute(array('nom' => $_POST['nom'],
									'region' => $_POST['region'],
									'position_nord' => $_POST['nord'],
									'position_est' => $_POST['est'],
									'altitude' => $_POST['altitude'],
									'trouve_par' => $_POST['trouve'],
									'fouille_par' => $_POST['fouille'],
									'type' => $_POST['type'],
									'commentaire' => $_POST['commentaire']
								)) or die('Error');
						echo 'Champ ajouté à la base.';
					?>
				
					<!-- Lien de retour vers la page des inputs. -->
					<p>
						<a href = "../input.php">Revenir</a>
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
