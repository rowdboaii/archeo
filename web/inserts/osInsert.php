<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : osInsert.php -->

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
		<title>OsInsert</title>
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
						$query = $bdd->prepare('INSERT INTO os (objet, partie, type, taxon, animal, type_animal, forme, dissous, morsure, conservation, datation)
																		VALUES(:objet, :partie, :type, :taxon, :animal, :type_animal, :forme, :dissous, :morsure, :conservation, :datation)');
						$query->execute(array('objet' => $_POST['objet'],
																	'partie' => $_POST['partie'],
																	'type' => $_POST['type'],
																	'taxon' => $_POST['taxon'],
																	'animal' => $_POST['animal'],
																	'type_animal' => $_POST['type_animal'],
																	'forme' => $_POST['forme'],
																	'dissous' => $_POST['dissous'],
																	'morsure' => $_POST['morsure'],
																	'conservation' => $_POST['conservation'],
																	'datation' => $_POST['datation']
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
