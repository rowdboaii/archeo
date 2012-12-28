<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : articleUpdate.php -->

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
		<title>ArticleUpdate</title>
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

							if ($_SESSION['champ'] == 'sujet' AND isset($_POST['old_type']) AND isset($_POST['new_type']))) {
								$query = $bdd->prepare('UPDATE article
											SET sujet = :new
											WHERE sujet = :old'
											);
								$query->execute(array('new' => $_POST['new'],
											'old' => $_POST['old']
											));
								$query = $bdd->prepare('UPDATE article
											SET type_sujet = :new
											WHERE type_sujet = :old'
											);
								$query->execute(array('new' => $_POST['new_type'],
											'old' => $_POST['old_type']
											));
							}
							else {
								if ($_SESSION['champ'] == 'titre') {
									$query = $bdd->prepare('UPDATE article
												SET titre = :new
												WHERE titre = :old'
												);
								}
								else if ($_SESSION['champ'] == 'auteur') {
									$query = $bdd->prepare('UPDATE article
												SET auteur = :new
												WHERE auteur = :old'
												);
								}
								else if ($_SESSION['champ'] == 'annee') {
									$query = $bdd->prepare('UPDATE article
												SET annee = :new
												WHERE annee = :old'
												);
								}
								else if ($_SESSION['champ'] == 'revue') {
									$query = $bdd->prepare('UPDATE article
												SET revue = :new
												WHERE revue = :old'
												);
								}
								else if ($_SESSION['champ'] == 'langue') {
									$query = $bdd->prepare('UPDATE article
												SET langue = :new
												WHERE langue = :old'
												);
								}
								else if ($_SESSION['champ'] == 'mot_cle') {
									$query = $bdd->prepare('UPDATE article
												SET mot_cle = :new
												WHERE mot_cle = :old'
												);
								}
								$query->execute(array('new' => $_POST['new'],
											'old' => $_POST['old']
											));
							}
						}

						if (!$query) {
							die("Erreur dans l'insertion : " . pg_last_error());
						}
						else {
							echo 'Champ modifié à la base.';
						}
					?>

					<!-- Lien de retour. -->
					<p>
						<a href = "../updates/articleUp.php">Revenir</a>
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
