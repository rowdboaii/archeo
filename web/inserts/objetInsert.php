<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : objetInsertInsert.php -->

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
		<title>ObjetInsert</title>
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
						$query = $bdd->prepare('INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, brule, periode, tamis, trouve_par, collection, fouille, prospection, fiche, commentaire)
																		VALUES(:nom, :type, :poids, :longueur, :largeur, :hauteur, :nature, :brule, :periode, :tamis, :trouve_par, :collection, :fouille, :prospection, :fiche, :commentaire)');
						$query->execute(array('nom' => $_POST['nom'],
																	'type' => $_POST['type'],
																	'poids' => $_POST['poids'],
																	'longueur' => $_POST['longueur'],
																	'largeur' => $_POST['largeur'],
																	'hauteur' => $_POST['hauteur'],
																	'nature' => $_POST['nature'],
																	'brule' => $_POST['brule'],
																	'periode' => $_POST['periode'],
																	'tamis' => $_POST['tamis'],
																	'trouve_par' => $_POST['trouve'],
																	'collection' => $_POST['collection'],
																	'fouille' => $_POST['fouille'],
																	'prospection' => $_POST['prospection'],
																	'fiche' => $_POST['fiche'],
																	'commentaire' => $_POST['commentaire'],
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
