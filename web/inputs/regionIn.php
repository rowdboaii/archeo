<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : regionIn.php -->

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
		<title>RégionIn</title>
	</head>

	<body>
	  <!-- Corps de la page. -->
		<div id = "">

			<header>
				<!-- Header de la page. -->
				<div id = "">

				</div>
			</header>

			<nav>
				<!-- Principaux liens de navigation de la page. -->
				<div id = "">

					<!-- Menu principal. -->
					<?php include('../includes/menuMain2.php'); ?>

				</div>
			</nav>

			<aside>
				<!-- Menu latéral spécifique au lien visité. -->
				<div id = "">

					<!-- Menu pour les inputs. -->
					<?php include('../includes/menuIn.php'); ?>

				</div>
			</aside>

			<?php if ($_SESSION['pseudo'] == 'sudo') { ?>
			<section>
				<!-- Section de page. -->
				<div id = "">

					<?php
						/* Connexion à la base de données. */
						include('../includes/connexionBDD.php');

						/* Récupération des données pour le formulaire. */
						$query = $bdd->prepare('SELECT identifiant, nom
									FROM pays'
									);
					?>

					<p>
						<!-- Formulaire pour une Région. -->
						<form method = "post" action = "../exec/regionInsert.php">
							<p>
								<label for = "nom">Nom</label> :
								<input type = "text" name = "nom" id = "nom" /><br />
								<label for = "pays">Pays</label> :
								<select name = "pays" id = "pays">
									<?php
										$query->execute();
										while ($data = $query->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select> 
								<a href = "../parameters/pays.php">Ajouter un nouveau Pays ?</a><br />
								<label for = "commentaire">Commentaires</label> :<br />
								<textarea name = "commentaire" id = "commentaire" rows = "10" cols = "80"></textarea><br />
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>

					<?php $query->closeCursor(); ?>

				</div>
			</section>
			<?php } ?>

			<footer>

				<!-- Pied de la page. -->
				<?php include('../includes/piedPage.php'); ?>

			</footer>

		</div>
	</body>

</html>
