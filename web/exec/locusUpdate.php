<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : locusUpdate.php -->

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
		<title>LocusUpdate</title>
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
								$query = $bdd->prepare('UPDATE locus
											SET nom = :new
											WHERE nom = :old'
											);
							}
							else if ($_SESSION['champ'] == 'site') {
								$query = $bdd->prepare('UPDATE locus
											SET site = :new
											WHERE site = :old'
											);
							}
							else if ($_SESSION['champ'] == 'type') {
								$query = $bdd->prepare('UPDATE locus
											SET type = :new
											WHERE type = :old'
											);
							}
							else if ($_SESSION['champ'] == 'position_nord') {
								$query = $bdd->prepare('UPDATE locus
											SET position_nord = :new
											WHERE position_nord = :old'
											);
							}
							else if ($_SESSION['champ'] == 'position_est') {
								$query = $bdd->prepare('UPDATE locus
											SET position_est = :new
											WHERE position_est = :old'
											);
							}
							else if ($_SESSION['champ'] == 'altitude') {
								$query = $bdd->prepare('UPDATE locus
											SET altitude = :new
											WHERE altitude = :old'
											);
							}
							else if ($_SESSION['champ'] == 'trouve_par') {
								$query = $bdd->prepare('UPDATE locus
											SET trouve_par = :new
											WHERE trouve_par = :old'
											);
							}
							else if ($_SESSION['champ'] == 'appartient_a') {
								$query = $bdd->prepare('UPDATE locus
											SET appartient_a = :new
											WHERE appartient_a = :old'
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
						<a href = "../updates/locusUp.php">Revenir</a>
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
