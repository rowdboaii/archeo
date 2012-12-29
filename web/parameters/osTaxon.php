<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : osTaxon.php -->

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
		<title>OsTaxon</title>
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
									FROM ostaxon'
									);
					?>

					<h2>Affichage</h2>
					<!-- Tableau d'affichage de la table. -->
					<table>
						<caption>OS TAXON</caption>

						<!-- Entête du tableau. -->
						<thead>
							<tr>
								<th>taxon</th>
							</tr>
						</thead>

						<!-- Pied du tableau. -->
						<tfoot>
							<tr>
								<th>taxon</th>
							</tr>
						</tfoot>

						<!-- Corps du tableau. -->
						<tbody>

							<?php
								while ($data = $query->fetch()) {
							?>

								<tr>
									<td><?php echo $data['taxon']; ?></td>
								</tr>

							<?php
								}
								$query->closeCursor();
							?>

						</tbody>
					</table>

					<!-- Insertion d'un Taxon d'un Os. -->
					<h2>Ajout</h2>
					<p>
						<!-- Formulaire pour un Taxon d'un Os. -->
						<form method = "post" action = "../inserts/osTaxonInsert.php">
							<p>
								<label for = "taxon">Taxon</label> :
								<input type = "text" name = "taxon" id = "taxon"><br />
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>

					<!-- Modification d'un Taxon d'un Os. -->
					<h2>Modification</h2>
					<p>
						<!-- Formulaire pour un Taxon d'un Os. -->
						<form method = "post" action = "../exec/osTaxonUpdate.php">
							<p>
								<label for = "old">Taxon à remplacer</label> :
								<input type = "text" name = "old" id = "old"><br />
								<label for = "new">Par</label> :
								<input type = "text" name = "new" id = "new"><br />
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>

					<!-- Suppression d'un Taxon d'un Os. -->
					<h2>Suppression</h2>
					<p>
						<!-- Formulaire pour un Taxon d'un Os. -->
						<form method = "post" action = "../exec/osTaxonDelete.php">
							<p>
								<label for = "delete">Taxon à supprimer</label> :
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
