<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : locusInsert.php -->

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
		<title>LocusInsert</title>
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
						$query = $bdd->prepare('INSERT INTO locus (nom, type, site, position_nord, position_est, altitude, trouve_par, appartient_a)
																		VALUES(:nom, :type, :site, :position_nord, :position_est, :altitude, :trouve_par, :appartient_a)');
						$query->execute(array('nom' => $_POST['nom'],
																	'type' => $_POST['type'],
																	'site' => $_POST['site'],
																	'position_nord' => $_POST['position_nord'],
																	'position_est' => $_POST['position_est'],
																	'altitude' => $_POST['altitude'],
																	'trouve_par' => $_POST['trouve_par'],
																	'appatient_a' => $_POST['appartient_a']
																	));
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
				<?php include('includes/piedPage.php'); ?>
			
			</footer>

		</div>
	</body>

</html>
