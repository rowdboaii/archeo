<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : silexUpdate.php -->

<!-- Démarrage de la session pour les identifiants. -->
<?php session_start(); ?>

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
		<title>SilexUpdate</title>
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
						if (isset($_SESSION['champ']) AND isset($_SESSION['updating']) AND isset($_POST['old']) AND isset($_POST['new'])) {
							
							else if ($_SESSION['champ'] == 'provenance')
								$query = $bdd->prepare('UPDATE silex
											SET provenance = :new
											WHERE provenance = :old
											AND objet = :objet'
											);
							}
							else if ($_SESSION['champ'] == 'couleur')
								$query = $bdd->prepare('UPDATE silex
											SET couleur = :new
											WHERE couleur = :old
											AND objet = :objet'
											);
							}
						}
						
						$query->execute(array('new' => $_POST['new'],
									'old' => $_POST['old'],
									'objet' => $_SESSION['updating']
									));

						if (!$query) {
							die("Erreur dans l'insertion : " . pg_last_error());
						}
						else {
							echo 'Champ modifié à la base.';
						}
					?>
				
					<!-- Lien de retour. -->
					<p>
						<a href = "../updates/silexUp.php">Revenir</a>
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
