<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : siteOut.htm -->

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
		<title>SiteOut</title>
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
						
					<?php $query = $bdd->query('SELECT s.nom, s.region, s.type, s.position_nord, s.position_est, s.altitude, s.trouve_par, s.fouille_par, s.commentaire
																			FROM site s'); ?>
					
					<!-- Tableau d'affichage de la table. -->
					<table>
						<caption>SITE</caption>
						
						<!-- Entête du tableau. -->
						<thead>
							<tr>
								<th>nom</th>
								<th>region</th>
								<th>type</th>
								<th>position nord</th>
								<th>position est</th>
								<th>altitude</th>
								<th>trouvé par</th>
								<th>fouillé par</th>
								<th>commentaires</th>
							</tr>
						</thead>
			
						<!-- Pied du tableau. -->
						<tfoot>
							<tr>
								<th>nom</th>
								<th>region</th>
								<th>type</th>
								<th>position nord</th>
								<th>position est</th>
								<th>altitude</th>
								<th>trouvé par</th>
								<th>fouillé par</th>
								<th>commentaires</th>
							</tr>
						</tfoot>
						
						<!-- Corps du tableau. -->
						<tbody>
						
							<?php
								while ($data = $query->fetch()) {
							?>
								
								<tr>
									<td><?php echo $data['nom']; ?></td>
									<td><?php echo $data['region']; ?></td>
									<td><?php echo $data['type']; ?></td>
									<td><?php echo $data['position_nord']; ?></td>
									<td><?php echo $data['position_est']; ?></td>
									<td><?php echo $data['altitude']; ?></td>
									<td><?php echo $data['prenom'] . ' ' . $data['nom']; ?></td>
									<td><?php echo $data['prenom'] . ' ' . $data['nom']; ?></td>
									<td><?php echo $data['']; ?></td>
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
