<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : langue.php -->

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
		<title>Langue</title>
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
					<?php include('../includes/menuMain.php'); ?>

				</div>
			</nav>

			<aside>
				<!-- Menu latéral spécifique au lien visité. -->
				<div id = "">

					<!-- Menu pour les Paramètres. -->
					<?php include('../includes/menuParameter.php'); ?>

				</div>
			</aside>

			<section>
				<!-- Section de page. -->
				<div id = "">

					<?php
						/* Connexion à la base de données. */
						include('../includes/connexionBDD.php');

						$query = $bdd->query('SELECT *
									FROM langue'
									);
					?>

					<h2>Affichage</h2>
					<!-- Tableau d'affichage de la table. -->
					<table>
						<caption>LANGUE</caption>

						<!-- Entête du tableau. -->
						<thead>
							<tr>
								<th>langue</th>
							</tr>
						</thead>

						<!-- Pied du tableau. -->
						<tfoot>
							<tr>
								<th>langue</th>
							</tr>
						</tfoot>

						<!-- Corps du tableau. -->
						<tbody>

							<?php
								while ($data = $query->fetch()) {
							?>

								<tr>
									<td><?php echo $data['langue']; ?></td>
								</tr>

							<?php
								}
								$query->closeCursor();
							?>

						</tbody>
					</table>

					<!-- Insertion d'une Langue. -->
					<h2>Ajout</h2>
					<p>
						<!-- Formulaire pour une Langue. -->
						<form method = "post" action = "../inserts/langueInsert.php">
							<p>
								<label for = "langue">Langue</label> :
								<input type = "text" name = "langue" id = "langue"><br />
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>

					<!-- Modification d'une Langue. -->
					<h2>Modification</h2>
					<p>
						<!-- Formulaire pour une Langue. -->
						<form method = "post" action = "../exec/langueUpdate.php">
							<p>
								<label for = "old">Langue à remplacer</label> :
								<input type = "text" name = "old" id = "old"><br />
								<label for = "new">Par</label> :
								<input type = "text" name = "new" id = "new"><br />
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>

					<!-- Suppression d'une Langue. -->
					<h2>Suppression</h2>
					<p>
						<!-- Formulaire pour une Langue. -->
						<form method = "post" action = "../exec/langueDelete.php">
							<p>
								<label for = "delete">Langue à supprimer</label> :
								<input type = "text" name = "delete" id = "delete"><br />
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
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
