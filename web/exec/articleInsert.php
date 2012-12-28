<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : articleInsert.php -->

<!-- Démarrage de la session pour les identifiants. -->
<?php session_start(); ?>

<!DOCTYPE html>
<html>

	<head>
		<!-- En-tête de la page. -->
		<meta charset = "utf-8" />
		<link rel = "stylesheet" href = "../styles/style.css" />
		<!-- Dans le cas où le navigateur est une version antérieure à IE9 -->
		<!--[if lt IE9]>
			<script src = "http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<title>ArticleInsert</title>
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
						$query = $bdd->prepare('INSERT INTO article (titre, auteur, revue, sujet, type_sujet, annee, langue, mot_cle, commentaire)
									VALUES (:titre, :auteur, :revue, :sujet, :type_sujet, :annee, :langue, :mot_cle, :commentaire)'
									);
						$query->execute(array('titre' => $_POST['titre'],
									'auteur' => $_POST['auteur'],
									'revue' => $_POST['revue'],
									'sujet' => $_POST['sujet'],
									'type_sujet' => $_POST['type_sujet'],
									'annee' => $_POST['annee'],
									'langue' => $_POST['langue'],
									'mot_cle' => $_POST['mot_cle'],
									'commentaire' => $_POST['commentaire']
									)) or die("error");
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
				<?php include('../includes/piedPage.php'); ?>

			</footer>

		</div>
	</body>

</html>
