<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : locusOut.php -->

<?php session_start(); ?>

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
		<title>LocusOut</title>
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
					<?php include('../includes/menuMain.php'); ?>

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
						
					<?php $query = $bdd->query('SELECT * 
																			FROM locus'); ?>
					
					<!-- Tableau d'affichage de la table. -->
					<table>
						<caption>LOCUS</caption>
						
						<!-- Entête du tableau. -->
						<thead>
							<tr>
								<th>identifiant</th>
								<th>nom</th>
								<th>site</th>
								<th>type</th>
								<th>position nord</th>
								<th>position est</th>
								<th>altitude</th>
								<th>trouvé par</th>
								<th>appartient à</th>
							</tr>
						</thead>
			
						<!-- Pied du tableau. -->
						<tfoot>
							<tr>
								<th>identifiant</th>
								<th>nom</th>
								<th>site</th>
								<th>type</th>
								<th>position nord</th>
								<th>position est</th>
								<th>altitude</th>
								<th>trouvé par</th>
								<th>appartient à</th>
							</tr>
						</tfoot>
						
						<!-- Corps du tableau. -->
						<tbody>
						
							<?php
								while ($data = $query->fetch()) {
							?>
								
								<tr>
									<td><?php echo $data['identifiant']; ?></td>
									<td><?php echo $data['nom']; ?></td>
									<td><?php echo $data['site']; ?></td>
									<td><?php echo $data['type']; ?></td>
									<td><?php echo $data['position_nord']; ?></td>
									<td><?php echo $data['position_est']; ?></td>
									<td><?php echo $data['altitude']; ?></td>
									<td><?php echo $data['trouve_par']; ?></td>
									<td><?php echo $data['appartient_a']; ?></td>
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
