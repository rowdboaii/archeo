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
		<link rel = "stylesheet" href = "../styles/style.css" />
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
						
					<?php
						$query = $bdd->query('SELECT o.nom AS nom_objet, s.partie, s.type, t.taxon AS nom_taxon, s.animal, s.type_animal,
									s.forme, s.dissous, s.morsure, s.conservation, s.datation, o.commentaire
									FROM os s, objet o, ostaxon t
									WHERE s.objet = o.identifiant
									AND s.taxon = t.identifiant'
									);
					?>
					
					<!-- Tableau d'affichage de la table. -->
					<table>
						<caption>OS</caption>
						
						<!-- Entête du tableau. -->
						<thead>
							<tr>
								<th>nom</th>
								<th>type</th>
								<th>poids</th>
								<th>longueur</th>
								<th>largeur</th>
								<th>hauteur</th>
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
								<th>brulé</th>
								<th>période</th>
								<th>trouvé par</th>
								<th>collection</th>
								<th>tamis</th>
								<th>type recherche</th>
								<th>recherche</th>
								<th>fiche</th>
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
								<th>brulé</th>
								<th>période</th>
								<th>trouvé par</th>
								<th>collection</th>
								<th>tamis</th>
								<th>type recherche</th>
								<th>recherche</th>
								<th>fiche</th>
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
									<td><?php echo $data['nom_objet']; ?></td>	<th>nom</th>
									<td><?php echo $data['type']; ?></td>		<th>type</th>
									<td><?php echo $data['']; ?></td>		<th>poids</th>
									<td><?php echo $data['']; ?></td>		<th>longueur</th>
									<td><?php echo $data['']; ?></td>		<th>largeur</th>
									<td><?php echo $data['']; ?></td>		<th>hauteur</th>
									<td><?php echo $data['partie']; ?></td>		<th>partie</th>
									<td><?php echo $data['type']; ?></td>		<th>type</th>
									<td><?php echo $data['nom_taxon']; ?></td>	<th>taxon</th>
									<td><?php echo $data['animal']; ?></td>		<th>animal</th>
									<td><?php echo $data['type_animal']; ?></td>	<th>type d'animal</th>
									<td><?php echo $data['forme']; ?></td>		<th>forme</th>
									<td><?php echo $data['dissous']; ?></td>	<th>dissous</th>
									<td><?php echo $data['morsure']; ?></td>	<th>morsure</th>
									<td><?php echo $data['conservation']; ?></td>	<th>conservation</th>
									<td><?php echo $data['datation']; ?></td>	<th>datation</th>
									<td><?php echo $data['']; ?></td>		<th>brulé</th>
									<td><?php echo $data['']; ?></td>		<th>période</th>
									<td><?php echo $data['']; ?></td>		<th>trouvé par</th>
									<td><?php echo $data['']; ?></td>		<th>collection</th>
									<td><?php echo $data['']; ?></td>		<th>tamis</th>
									<td><?php echo $data['']; ?></td>		<th>type recherche</th>
									<td><?php echo $data['']; ?></td>		<th>recherche</th>
									<td><?php echo $data['']; ?></td>		<th>fiche</th>
									<td><?php echo $data['commentaire']; ?></td>	<th>commentaires</th>
									
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
