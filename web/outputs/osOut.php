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
									s.forme, s.dissous, s.morsure, s.conservation, s.datation, o.commentaire, o.poids,
									o.longueur, o.largeur, o.hauteur, o.brule, o.tamis, o.fiche, u.type AS nom_type,
									p.periode AS nom_periode, f.prenom AS prenom_f, f.nom AS nom_f
									FROM os s, objet o, ostaxon t, objettype u, periode p, personne f
									WHERE s.objet = o.identifiant
									AND s.taxon = t.identifiant
									AND o.type = u.identifiant
									AND o.trouve_par = f.identifiant'
									);
					?>
					
					<!-- Tableau d'affichage de la table. -->
					<table>
						<caption>OS</caption>
						
						<!-- Entête du tableau. -->
						<thead>
							<tr>
								<th>nom</th>
								<th>type objet</th>
								<th>type os</th>
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
								<th>type objet</th>
								<th>type os</th>
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
									<td><?php echo $data['nom_objet']; ?></td>
									<td><?php echo $data['nom_type']; ?></td>
									<td><?php echo $data['type']; ?></td>
									<td><?php echo $data['poids']; ?></td>
									<td><?php echo $data['longueur']; ?></td>
									<td><?php echo $data['largeur']; ?></td>
									<td><?php echo $data['hauteur']; ?></td>
									<td><?php echo $data['partie']; ?></td>
									<td><?php echo $data['type']; ?></td>
									<td><?php echo $data['nom_taxon']; ?></td>
									<td><?php echo $data['animal']; ?></td>
									<td><?php echo $data['type_animal']; ?></td>
									<td><?php echo $data['forme']; ?></td>
									<td><?php echo $data['dissous']; ?></td>
									<td><?php echo $data['morsure']; ?></td>
									<td><?php echo $data['conservation']; ?></td>
									<td><?php echo $data['datation']; ?></td>
									<td><?php echo $data['brule']; ?></td>
									<td><?php echo $data['nom_periode']; ?></td>
									<td><?php echo $data['prenom_f'] . ' ' . $data['nom_f']; ?></td>
									<td><?php echo $data['']; ?></td>
									<td><?php echo $data['tamis']; ?></td>
									<td><?php echo $data['']; ?></td>
									<td><?php echo $data['']; ?></td>
									<td><?php echo $data['fiche']; ?></td>
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
