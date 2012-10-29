<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : osTaxonDel.php -->

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
		<title>OsTaxonDelete</title>
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
						$query = $bdd->prepare('DELETE FROM ostaxon
																		WHERE taxon = :delete'
																		);
						$query->execute(array('delete' => $_POST['delete']));

						if (!$query) {
							die("Erreur dans l'insertion : " . pg_last_error());
						}
						else {
							echo 'Champ supprimé de la base.';
						}
					?>
				
					<!-- Lien de retour. -->
					<p>
						<a href = "../parameters/osTaxon.php">Revenir</a>
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
