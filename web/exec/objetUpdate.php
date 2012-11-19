<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : objetUpdate.php -->

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
		<title>ObjetUpdate</title>
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
						if (isset($_SESSION['champ']) AND isset($_POST['old']) AND isset($_POST['new'])) {
							
							if ($_SESSION['champ'] == 'nom') {
								$query = $bdd->prepare('UPDATE objet
											SET nom = :new
											WHERE nom = :old'
											);
							}
							else if ($_SESSION['champ'] == 'type') {
								$query = $bdd->prepare('UPDATE objet
											SET type = :new
											WHERE type = :old'
											);
							}
							else if ($_SESSION['champ'] == 'poids') {
								$query = $bdd->prepare('UPDATE objet
											SET poids = :new
											WHERE poids = :old'
											);
							}
							else if ($_SESSION['champ'] == 'longueur') {
								$query = $bdd->prepare('UPDATE objet
											SET longueur = :new
											WHERE longueur = :old'
											);
							}
							else if ($_SESSION['champ'] == 'largeur') {
								$query = $bdd->prepare('UPDATE objet
											SET largeur = :new
											WHERE largeur = :old'
											);
							}
							else if ($_SESSION['champ'] == 'hauteur') {
								$query = $bdd->prepare('UPDATE objet
											SET hauteur = :new
											WHERE hauteur = :old'
											);
							}
							else if ($_SESSION['champ'] == 'nature') {
								$query = $bdd->prepare('UPDATE objet
											SET nature = :new
											WHERE nature = :old'
											);
							}
							else if ($_SESSION['champ'] == 'periode') {
								$query = $bdd->prepare('UPDATE objet
											SET periode = :new
											WHERE periode = :old'
											);
							}
							else if ($_SESSION['champ'] == 'trouve_par') {
								$query = $bdd->prepare('UPDATE objet
											SET trouve_par = :new
											WHERE trouve_par = :old'
											);
							}
						}
						
						$query->execute(array('new' => $_POST['new'],
									'old' => $_POST['old']
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
						<a href = "../updates/objetUp.php">Revenir</a>
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
