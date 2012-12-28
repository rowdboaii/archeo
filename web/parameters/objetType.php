<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Muth & Antoine Hars -->
<!-- Fichier : objetType.php -->

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
		<title>ObjetType</title>
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
									FROM objettype'
									);
					?>

					<h2>Affichage</h2>
					<!-- Tableau d'affichage de la table. -->
					<table>
						<caption>OBJET TYPE</caption>

						<!-- Entête du tableau. -->
						<thead>
							<tr>
								<th>type</th>
							</tr>
						</thead>

						<!-- Pied du tableau. -->
						<tfoot>
							<tr>
								<th>type</th>
							</tr>
						</tfoot>

						<!-- Corps du tableau. -->
						<tbody>

							<?php
								while ($data = $query->fetch()) {
							?>

								<tr>
									<td><?php echo $data['type']; ?></td>
								</tr>

							<?php
								}
								$query->closeCursor();
							?>

						</tbody>
					</table>

					<!-- Insertion d'un Type d'un Objet. -->
					<h2>Ajout</h2>
					<p>
						<!-- Formulaire pour un Type d'un Objet. -->
						<form method = "post" action = "../inserts/objetTypeInsert.php">
							<p>
								<label for = "type">Type</label> :
								<input type = "text" name = "type" id = "type"><br />
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>

					<!-- Modification d'un Type d'Objet. -->
					<h2>Modification</h2>
					<p>
						<!-- Formulaire pour un Type d'Objet. -->
						<form method = "post" action = "../exec/objetTypeUpdate.php">
							<p>
								<label for = "old">Type à remplacer</label> :
								<input type = "text" name = "old" id = "old"><br />
								<label for = "new">Par</label> :
								<input type = "text" name = "new" id = "new"><br />
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>

					<!-- Suppression d'un Type d'Objet. -->
					<h2>Suppression</h2>
					<p>
						<!-- Formulaire pour un Type d'Objet. -->
						<form method = "post" action = "../exec/objetTypeDelete.php">
							<p>
								<label for = "delete">Type à supprimer</label> :
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
