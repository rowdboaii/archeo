<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
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
					<?php include('../includes/menuMain2.php'); ?>

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
						$query1 = $bdd->query('SELECT o.nom, t.type, o.longueur, o.poids, o.largeur, o.hauteur, n.nature, o.brule, p.periode, e.prenom AS pfouilleur, e.nom AS nfouilleur, o.collection, o.tamis, o.commentaire
									FROM objet o, objettype t, objetnature n, periode p, personne e
									WHERE o.type_recherche = \' \'
									AND o.type = t.identifiant
									AND o.nature = n.identifiant
									AND o.periode = p.identifiant
									AND o.trouve_par = e.identifiant'
									);

						/* Objets trouvés en fouillant. */
						$query2 = $bdd->query('SELECT o.nom, t.type, o.longueur, o.poids, o.largeur, o.hauteur, n.nature, o.brule, p.periode, e.prenom AS pfouilleur, e.nom AS nfouilleur, o.collection, o.tamis, o.commentaire, o.type_recherche, f.nom AS fouille
									FROM objet o, objettype t, objetnature n, periode p, personne e, fouille f
									WHERE o.type_recherche = \'fouille\'
									AND o.type = t.identifiant
									AND o.nature = n.identifiant
									AND o.periode = p.identifiant
									AND o.trouve_par = e.identifiant
									AND o.recherche = f.identifiant'
									);

						/* Objets trouvés en prospectant. */
						$query3 = $bdd->query('SELECT o.nom, t.type, o.longueur, o.poids, o.largeur, o.hauteur, n.nature, o.brule, p.periode, e.prenom AS pfouilleur, e.nom AS nfouilleur, o.collection, o.tamis, o.commentaire, o.type_recherche, r.nom AS prospection
									FROM objet o, objettype t, objetnature n, periode p, personne e, prospection r
									WHERE o.type_recherche = \'prospection\'
									AND o.type = t.identifiant
									AND o.nature = n.identifiant
									AND o.periode = p.identifiant
									AND o.trouve_par = e.identifiant
									AND o.recherche = r.identifiant'
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
								<th>brulé</th>
								<th>période</th>
								<th>trouvé par</th>
								<th>collection</th>
								<th>tamis</th>
								<th>type recherche</th>
								<th>recherche</th>
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
								<th>brulé</th>
								<th>période</th>
								<th>trouvé par</th>
								<th>collection</th>
								<th>tamis</th>
								<th>type recherche</th>
								<th>recherche</th>
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
									<td><?php echo $data['type']; ?></td>
									<td><?php echo $data['poids']; ?></td>
									<td><?php echo $data['longueur']; ?></td>
									<td><?php echo $data['largeur']; ?></td>
									<td><?php echo $data['hauteur']; ?></td>
									<td><?php echo $data['nature']; ?></td>
									<td><?php echo $data['brule']; ?></td>
									<td><?php echo $data['periode']; ?></td>
									<td><?php echo $data['pfouilleur'] . ' ' . $data['nfouilleur']; ?></td>
									<td><?php echo $data['collection']; ?></td>
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
									<td><?php echo $data['type']; ?></td>
									<td><?php echo $data['poids']; ?></td>
									<td><?php echo $data['longueur']; ?></td>
									<td><?php echo $data['largeur']; ?></td>
									<td><?php echo $data['hauteur']; ?></td>
									<td><?php echo $data['nature']; ?></td>
									<td><?php echo $data['brule']; ?></td>
									<td><?php echo $data['periode']; ?></td>
									<td><?php echo $data['pfouilleur'] . ' ' . $data['nfouilleur']; ?></td>
									<td><?php echo $data['collection']; ?></td>
									<td><?php echo $data['tamis']; ?></td>
									<td><?php echo $data['type_recherche']; ?></td>
									<td><?php echo $data['fouille']; ?></td>
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
									<td><?php echo $data['type']; ?></td>
									<td><?php echo $data['poids']; ?></td>
									<td><?php echo $data['longueur']; ?></td>
									<td><?php echo $data['largeur']; ?></td>
									<td><?php echo $data['hauteur']; ?></td>
									<td><?php echo $data['nature']; ?></td>
									<td><?php echo $data['brule']; ?></td>
									<td><?php echo $data['periode']; ?></td>
									<td><?php echo $data['pfouilleur'] . ' ' . $data['nfouilleur']; ?></td>
									<td><?php echo $data['collection']; ?></td>
									<td><?php echo $data['tamis']; ?></td>
									<td><?php echo $data['type_recherche']; ?></td>
									<td><?php echo $data['prospection']; ?></td>
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
