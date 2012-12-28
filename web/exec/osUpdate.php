<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : osUpdate.php -->

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
		<title>OsUpdate</title>
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

							if ($_SESSION['champ'] == 'objet') {
								$query = $bdd->prepare('UPDATE os
											SET objet = :new
											WHERE objet = :old'
											);
							}
							else if ($_SESSION['champ'] == 'partie') {
								$query = $bdd->prepare('UPDATE os
											SET partie = :new
											WHERE partie = :old'
											);
							}
							else if ($_SESSION['champ'] == 'type') {
								$query = $bdd->prepare('UPDATE os
											SET type = :new
											WHERE type = :old'
											);
							}
							else if ($_SESSION['champ'] == 'taxon') {
								$query = $bdd->prepare('UPDATE os
											SET taxon = :new
											WHERE taxon = :old'
											);
							}
							else if ($_SESSION['champ'] == 'animal') {
								$query = $bdd->prepare('UPDATE os
											SET animal = :new
											WHERE animal = :old'
											);
							}
							else if ($_SESSION['champ'] == 'type_animal') {
								$query = $bdd->prepare('UPDATE os
											SET type_animal = :new
											WHERE type_animal = :old'
											);
							}
							else if ($_SESSION['champ'] == 'forme') {
								$query = $bdd->prepare('UPDATE os
											SET forme = :new
											WHERE forme = :old'
											);
							}
							else if ($_SESSION['champ'] == 'datation') {
								$query = $bdd->prepare('UPDATE os
											SET datation = :new
											WHERE datation = :old'
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
						<a href = "../updates/osUp.php">Revenir</a>
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
