﻿<!-- Sujet : Projet de base de données pour des fouilles archéogiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : collectionDel.php -->

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
		<title>CollectionDel</title>
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

					<!-- Menu pour les Deletes. -->
					<?php include('../includes/menuDel.php'); ?>

				</div>
			</aside>

			<?php if ($_SESSION['pseudo'] == 'sudo') { ?>

			<section>
				<!-- Section de page. -->
				<div id = "">

					<?php
						/* Connexion à base de données. */
						include('../includes/connexionBDD.php');

						/* Répération des données pour le formulaire. */
						$query = $bdd->prepare('SELECT c.identifiant, c.nom
									FROM collection c'
									);
					?>

					<p>
						<!-- Formulaire pour le Delete d'une Collection. -->
						<form method = "post" action = "../exec/collectionDelete.php">
							<p>
								<label for = "delete">Collection à supprimer</label> :
								<select name = "delete" id = "delete">
									<option value = "0"></option>
									<?php
										$query->execute();
										while ($data = $query->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select><br />
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>

					<?php
						$query->closeCursor();
					?>

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
