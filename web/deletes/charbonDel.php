﻿<!-- Sujet : Projet de base de données pour des fouilles archéogiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : CharbonDel.php -->

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
		<title>CharbonDel</title>
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

						/* Récupération des données pour le formulaire. */
						$query = $bdd->prepare('SELECT c.objet, o.nom
									FROM charbon c, objet o
									WHERE c.objet = o.identifiant'
									);
					?>

					<p>
						<!-- Formulaire pour le Delete d'un Charbon. -->
						<form method = "post" action = "../exec/charbonDelete.php">
							<p>
								<label for = "delete">Charbon à supprimer</label> :
								<select name = "delete" id = "delete">
									<option value = "0"></option>
									<?php
										$query->execute();
										while ($data = $query->fetch()) {
											echo '<option value = "' . $data['objet'] . '">' . $data['nom'] . '</option>';
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
