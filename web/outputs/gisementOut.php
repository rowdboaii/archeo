<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : gisementOut.php -->

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
		<title>gisementOut</title>
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

					<!-- Menu principal. -->
					<?php include('../includes/menuMain2.php'); ?>

				</div>
			</nav>

			<aside>
				<!-- Menu latéral spécifique au lien visité. -->
				<div id = "">

					<!-- Menu pour les outputs. -->
					<?php include('../includes/menuOut.php'); ?>

				</div>
			</aside>

			<section>
				<!-- Section de page. -->
				<div id = "">

					<?php
						$query = $bdd->query('SELECT g.identifiant, g.nom, r.nom AS nom_region, g.position_nord, g.position_est, g.altitude, g.commentaire
									FROM gisement g, region r
									WHERE g.region = r.identifiant'
									);
					?>

					<!-- Tableau d'affichage de la table. -->
					<table>
						<caption>GISEMENT</caption>

						<!-- Entête du tableau. -->
						<thead>
							<tr>
								<th>nom</th>
								<th>region</th>
								<th>position nord</th>
								<th>position est</th>
								<th>altitude</th>
								<th>commentaires</th>
							</tr>
						</thead>

						<!-- Pied du tableau. -->
						<tfoot>
							<tr>
								<th>nom</th>
								<th>region</th>
								<th>position nord</th>
								<th>position est</th>
								<th>altitude</th>
								<th>commentaires</th>
							</tr>
						</tfoot>

						<!-- Corps du tableau. -->
						<tbody>

							<?php
								while ($data = $query->fetch())
								{
							?>

								<tr>
									<td><?php echo $data['nom']; ?></td>
									<td><?php echo $data['nom_region']; ?></td>
									<td><?php echo $data['position_nord']; ?></td>
									<td><?php echo $data['position_est']; ?></td>
									<td><?php echo $data['altitude']; ?></td>
									<td><?php echo $data['commentaire']; ?></td>
								</tr>

							<?php
								}
								$query->closeCursor();
							?>

						</tbody>
					</table>

				</div>
			</section>

			<footer>

				<!-- Pied de la page. -->
				<?php include('../includes/piedPage.php'); ?>

			</footer>

		</div>
	</body>

</html>
