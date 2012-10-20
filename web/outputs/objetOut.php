<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : objetOut.htm -->

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
		<title>objetOut</title>
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
																			FROM objet'); ?>
					
					<!-- Tableau d'affichage de la table. -->
					<table>
						<caption>OBJET</caption>
						
						<!-- Entête du tableau. -->
						<thead>
							<tr>
								<th>nom</th>
								<th>type</th>
								<th>poids</th>
								<th>longueur</th>
								<th>largeur</th>
								<th>hauteur</th>
								<th>nature</th>
								<th>fiche</th>
								<th>brulé</th>
								<th>période</th>
								<th>trouvé par</th>
								<th>collection</th>
								<th>tamis</th>
								<th>prospection</th>
								<th>fouille</th>
								<th>commentaires</th>
							</tr>
						</thead>
			
						<!-- Pied du tableau. -->
						<tfoot>
							<tr>
								<th>nom</th>
								<th>type</th>
								<th>poids</th>
								<th>longueur</th>
								<th>largeur</th>
								<th>hauteur</th>
								<th>nature</th>
								<th>fiche</th>
								<th>brulé</th>
								<th>période</th>
								<th>trouvé par</th>
								<th>collection</th>
								<th>tamis</th>
								<th>prospection</th>
								<th>fouille</th>
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
									<td><?php echo $data['type']; ?></td>
									<td><?php echo $data['poids']; ?></td>
									<td><?php echo $data['longueur']; ?></td>
									<td><?php echo $data['largeur']; ?></td>
									<td><?php echo $data['hauteur']; ?></td>
									<td><?php echo $data['nature']; ?></td>
									<td><?php echo $data['fiche']; ?></td>
									<td><?php echo $data['brule']; ?></td>
									<td><?php echo $data['periode']; ?></td>
									<td><?php echo $data['trouve_par']; ?></td>
									<td><?php echo $data['collection']; ?></td>
									<td><?php echo $data['tamis']; ?></td>
									<td><?php echo $data['prospection']; ?></td>
									<td><?php echo $data['fouille']; ?></td>
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
