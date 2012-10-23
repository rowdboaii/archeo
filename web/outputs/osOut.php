<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : osOut.php -->

<!-- Démarrage de la session pour les identifiants. -->
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
		<title>osOut</title>
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
																			FROM os'); ?>
					
					<!-- Tableau d'affichage de la table. -->
					<table>
						<caption>OS</caption>
						
						<!-- Entête du tableau. -->
						<thead>
							<tr>
								<th>objet</th>
								<th>partie</th>
								<th>type</th>
								<th>taxon</th>
								<th>animal</th>
								<th>type d'animal</th>
								<th>forme</th>
								<th>dissous</th>
								<th>morsure</th>
								<th>conservation</th>
								<th>datation</th>
							</tr>
						</thead>
			
						<!-- Pied du tableau. -->
						<tfoot>
							<tr>
								<th>objet</th>
								<th>partie</th>
								<th>type</th>
								<th>taxon</th>
								<th>animal</th>
								<th>type d'animal</th>
								<th>forme</th>
								<th>dissous</th>
								<th>morsure</th>
								<th>conservation</th>
								<th>datation</th>
							</tr>
						</tfoot>
						
						<!-- Corps du tableau. -->
						<tbody>
						
							<?php
								while ($data = $query->fetch())
								{
							?>
								
								<tr>
									<td><?php echo $data['objet']; ?></td>
									<td><?php echo $data['partie']; ?></td>
									<td><?php echo $data['type']; ?></td>
									<td><?php echo $data['taxon']; ?></td>
									<td><?php echo $data['animal']; ?></td>
									<td><?php echo $data['type_animal']; ?></td>
									<td><?php echo $data['forme']; ?></td>
									<td><?php echo $data['dissous']; ?></td>
									<td><?php echo $data['morsure']; ?></td>
									<td><?php echo $data['conservation']; ?></td>
									<td><?php echo $data['datation']; ?></td>
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
