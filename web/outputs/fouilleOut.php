<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : fouilleOut.php -->

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
		<title>fouilleOut</title>
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
						
					<?php
						$query = $bdd->query('SELECT f.identifiant, f.nom, p.prenom, p.nom AS nom_personne, d.nom AS nom_decapage, f.annee, f.commentaire
									FROM fouille f, personne p, decapage d
									WHERE f.fouilleur = p.identifiant
									AND f.decapage = d.identifiant'
									);
					?>
					
					<!-- Tableau d'affichage de la table. -->
					<table>
						<caption>FOUILLE</caption>
						
						<!-- Entête du tableau. -->
						<thead>
							<tr>
								<th>nom</th>
								<th>fouilleur</th>
								<th>decapage</th>
								<th>année</th>
								<th>commentaires</th>
							</tr>
						</thead>
			
						<!-- Pied du tableau. -->
						<tfoot>
							<tr>
								<th>nom</th>
								<th>fouilleur</th>
								<th>decapage</th>
								<th>année</th>
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
									<td><?php echo $data['prenom'] . ' ' . $data['nom_personne']; ?></td>
									<td><?php echo $data['nom_decapage']; ?></td>
									<td><?php echo $data['annee']; ?></td>
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
