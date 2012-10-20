<!-- Sujet : Projet de base de donn�es pour des fouilles arch�ologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : articleOut.htm -->

<!DOCTYPE html>
<html>

	<head>
		<!-- En-t�te de la page. -->
		<meta charset = "utf-8" />
		<link rel = "stylesheet" href = "style.css" />
		<!-- Dans le cas o� le navigateur est une version ant�rieure � IE9 -->
		<!--[if lt IE9]>
			<script src = "http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<title>articleOut</title>
	</head>

	<body>
	  <!-- Corps de la page. -->
		<div id = "">

			<!-- Connexion � la base de donn�es. -->
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
				<!-- Menu lat�ral sp�cifique au lien visit�. -->
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
						
						<!-- Ent�te du tableau. -->
						<thead>
							<tr>
								<th>identifiant</th>
								<th>titre</th>
								<th>auteur</th>
								<th>mots cl�</th>
								<th>ann�e</th>
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
								<th>mots cl�</th>
								<th>ann�e</th>
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
