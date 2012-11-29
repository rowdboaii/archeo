<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : objetOut.php -->

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
						
					<?php
						/* Objets trouvés sans recherches. */
						$query1 = $bdd->query('SELECT o.identifiant, o.nom, o.poids, o.longueur, o.largeur, o.hauteur, o.brule, o.tamis,
									o.commentaire, t.type AS nom_type, n.nature AS nom_nature, p.periode AS nom_periode,
									f.prenom AS prenom_f, f.nom AS nom_f, c.nom AS nom_collection, o.fiche, o.type_recherche
									FROM objet o, objettype t, objetnature n, periode p, personne f, collection c
									WHERE o.type = t.identifiant
									AND o.nature = n.identifiant
									AND o.periode = p.identifiant
									AND o.trouve_par = f.identifiant
									AND o.collection = c.identifiant
									AND o.type_recherche = \' \''
									);
						/* Objets trouvés en fouillant. */
						$query2 = $bdd->query('SELECT o.identifiant, o.nom, o.poids, o.longueur, o.largeur, o.hauteur, o.brule, o.tamis,
									o.commentaire, t.type AS nom_type, n.nature AS nom_nature, p.periode AS nom_periode,
									f.prenom AS prenom_f, f.nom AS nom_f, u.nom AS nom_fouille, o.fiche, o.type_recherche
									FROM objet o, objettype t, objetnature n, periode p, personne f, fouille u
									WHERE o.type = t.identifiant
									AND o.nature = n.identifiant
									AND o.periode = p.identifiant
									AND o.trouve_par = f.identifiant
									AND o.recherche = u.identifiant
									AND o.type_recherche = \'fouille\''
									);
						/* Objets trouvés en prospectant. */
						$query3 = $bdd->query('SELECT o.identifiant, o.nom, o.poids, o.longueur, o.largeur, o.hauteur, o.brule, o.tamis,
									o.commentaire, t.type AS nom_type, n.nature AS nom_nature, p.periode AS nom_periode,
									f.prenom AS prenom_f, f.nom AS nom_f, r.nom AS nom_prospection, o.fiche, o.type_recherche
									FROM objet o, objettype t, objetnature n, periode p, personne f, prospection r
									WHERE o.type = t.identifiant
									AND o.nature = n.identifiant
									AND o.periode = p.identifiant
									AND o.trouve_par = f.identifiant
									AND o.recherche = r.identifiant
									AND o.type_recherche = \'prospection\''
									);
					?>
					
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
								while ($data = $query1->fetch())
								{
							?>
								
								<tr>
									<td><?php echo $data['nom']; ?></td>
									<td><?php echo $data['nom_type']; ?></td>
									<td><?php echo $data['poids']; ?></td>
									<td><?php echo $data['longueur']; ?></td>
									<td><?php echo $data['largeur']; ?></td>
									<td><?php echo $data['hauteur']; ?></td>
									<td><?php echo $data['nom_nature']; ?></td>
									<td><?php echo $data['fiche']; ?></td>
									<td><?php echo $data['brule']; ?></td>
									<td><?php echo $data['nom_periode']; ?></td>
									<td><?php echo $data['prenom_f'] . ' ' . $data['nom_f']; ?></td>
									<td><?php echo $data['nom_collection']; ?></td>
									<td><?php echo $data['tamis']; ?></td>
									<td></td>
									<td></td>
									<td><?php echo $data['commentaire']; ?></td>
								</tr>
								
							<?php
								}
								$query1->closeCursor();

								while ($data = $query2->fetch())
								{
							?>
								
								<tr>
									<td><?php echo $data['nom']; ?></td>
									<td><?php echo $data['nom_type']; ?></td>
									<td><?php echo $data['poids']; ?></td>
									<td><?php echo $data['longueur']; ?></td>
									<td><?php echo $data['largeur']; ?></td>
									<td><?php echo $data['hauteur']; ?></td>
									<td><?php echo $data['nom_nature']; ?></td>
									<td><?php echo $data['fiche']; ?></td>
									<td><?php echo $data['brule']; ?></td>
									<td><?php echo $data['nom_periode']; ?></td>
									<td><?php echo $data['prenom_f'] . ' ' . $data['nom_f']; ?></td>
									<td></td>
									<td><?php echo $data['tamis']; ?></td>
									<td></td>
									<td><?php echo $data['nom_fouille']; ?></td>
									<td><?php echo $data['commentaire']; ?></td>
								</tr>
								
							<?php
								}
								$query2->closeCursor();

								while ($data = $query3->fetch())
								{
							?>
								
								<tr>
									<td><?php echo $data['nom']; ?></td>
									<td><?php echo $data['nom_type']; ?></td>
									<td><?php echo $data['poids']; ?></td>
									<td><?php echo $data['longueur']; ?></td>
									<td><?php echo $data['largeur']; ?></td>
									<td><?php echo $data['hauteur']; ?></td>
									<td><?php echo $data['nom_nature']; ?></td>
									<td><?php echo $data['fiche']; ?></td>
									<td><?php echo $data['brule']; ?></td>
									<td><?php echo $data['nom_periode']; ?></td>
									<td><?php echo $data['prenom_f'] . ' ' . $data['nom_f']; ?></td>
									<td></td>
									<td><?php echo $data['tamis']; ?></td>
									<td><?php echo $data['nom_prospection']; ?></td>
									<td></td>
									<td><?php echo $data['commentaire']; ?></td>
								</tr>
								
							<?php
								}
								$query3->closeCursor();
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
