<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : articleOut.php -->

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
		<title>articleOut</title>
	</head>

	<body>
	  <!-- Corps de la page. -->
		<div id = "">

			<!-- Connexion à la base de donn�es. -->
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
																			FROM article'); ?>
					
					<!-- Tableau d'affichage de la table. -->
					<table>
						<caption>ARTICLE</caption>
						
						<!-- Entête du tableau. -->
						<thead>
							<tr>
								<th>identifiant</th>
								<th>titre</th>
								<th>auteur</th>
								<th>mots clé</th>
								<th>année</th>
								<th>revue</th>
								<th>langue</th>
								<th>sujet</th>
							</tr>
						</thead>
			
						<!-- Pied du tableau. -->
						<tfoot>
							<tr>
								<th>identifiant</th>
								<th>titre</th>
								<th>auteur</th>
								<th>mots clé</th>
								<th>année</th>
								<th>revue</th>
								<th>langue</th>
								<th>sujet</th>
							</tr>
						</tfoot>
						
						<!-- Corps du tableau. -->
						<tbody>
						
							<?php
								while ($data = $query->fetch()) {
							?>
								
								<tr>
									<td><?php echo $data['identifiant']; ?></td>
									<td><?php echo $data['titre']; ?></td>
									<td><?php echo $data['auteur']; ?></td>
									<td><?php echo $data['mot_cle']; ?></td>
									<td><?php echo $data['annee']; ?></td>
									<td><?php echo $data['revue']; ?></td>
									<td><?php echo $data['langue']; ?></td>
									<td><?php echo $data['sujet']; ?></td>
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
