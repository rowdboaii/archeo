<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : periode.php -->

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
		<title>Période</title>
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
									FROM periode'
									);
					?>

					<h2>Affichage</h2>
					<!-- Tableau d'affichage de la table. -->
					<table>
						<caption>PÉRIODE</caption>

						<!-- Entête du tableau. -->
						<thead>
							<tr>
								<th>période</th>
							</tr>
						</thead>

						<!-- Pied du tableau. -->
						<tfoot>
							<tr>
								<th>période</th>
							</tr>
						</tfoot>

						<!-- Corps du tableau. -->
						<tbody>

							<?php
								while ($data = $query->fetch()) {
							?>

								<tr>
									<td><?php echo $data['periode']; ?></td>
								</tr>

							<?php
								}
								$query->closeCursor();
							?>

						</tbody>
					</table>

					<!-- Insertion d'une Période. -->
					<h2>Ajout</h2>
					<p>
						<!-- Formulaire pour une Période. -->
						<form method = "post" action = "../inserts/periodeInsert.php">
							<p>
								<label for = "periode">Période</label> :
								<input type = "text" name = "periode" id = "periode"><br />
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>

					<!-- Modification d'une Période. -->
					<h2>Modification</h2>
					<p>
						<!-- Formulaire pour une Période. -->
						<form method = "post" action = "../exec/periodeUpdate.php">
							<p>
								<label for = "old">Période à remplacer</label> :
								<input type = "text" name = "old" id = "old"><br />
								<label for = "new">Par</label> :
								<input type = "text" name = "new" id = "new"><br />
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>

					<!-- Suppression d'une Période. -->
					<h2>Suppression</h2>
					<p>
						<!-- Formulaire pour une Période. -->
						<form method = "post" action = "../exec/periodeDelete.php">
							<p>
								<label for = "delete">Période à supprimer</label> :
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
