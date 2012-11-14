<!-- Sujet : Projet de base de donn�es pour des fouilles arch�ologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : siteTypeUpdate.php -->

<!DOCTYPE html>
<html>

	<head>
		<!-- En-t�te de la page. -->
		<meta charset = "utf-8" />
		<link rel = "stylesheet" href = "style.css" />
		<!-- Dans le cas o� le navigateur est une version ant�rieure � IE9 -->
		<!--[if lt IE9]>
			<script src = "http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<title>SiteTypeUpdate</title>
	</head>

	<body>
	  <!-- Corps de la page. -->
		<div id = "">

			<!-- Connexion � la base de donn�es. -->
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
				<!-- Menu lat�ral sp�cifique au lien visit�. -->
				<div id = "">
				
				</div>
			</aside>
			<section>

				<!-- Section de page. -->
				<div id = "">	
	
					<?php
						$query = $bdd->prepare('UPDATE sitetype
												SET type = :new_type
												WHERE identifiant = :identifiant
												AND identifiant > 0');
						$query->execute(array('new_type' => $_POST['new_type'],
												'identifiant' => $_POST['identifiant']));

						if (!$query) {
							die("Erreur dans la modification de champ : " . pg_last_error());
						}
						else {
							echo 'Champ modifi�.';
						}
					?>
				
					<!-- Lien de retour. -->
					<p>
						<a href = "../parameters/siteType.php">Revenir</a>
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