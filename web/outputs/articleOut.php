<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : articleOut.php -->

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
		<title>ArticleOut</title>
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
						$query1 = $bdd->query('SELECT a.identifiant, a.titre, a.auteur, p.prenom, p.nom, a.mot_cle, a.annee, a.revue, r.nom AS nom_region, l.langue AS nom_langue, a.commentaire, a.type_sujet, a.sujet
									FROM article a, personne p, langue l, region r
									WHERE a.auteur = p.identifiant
									AND a.langue = l.identifiant
									AND a.sujet = r.identifiant'
									);
						$query2 = $bdd->query('SELECT a.identifiant, a.titre, a.auteur, p.prenom, p.nom, a.mot_cle, a.annee, a.revue, s.nom AS nom_site, l.langue AS nom_langue, a.commentaire, a.type_sujet, a.sujet
									FROM article a, personne p, langue l, site s
									WHERE a.auteur = p.identifiant
									AND a.langue = l.identifiant
									AND a.sujet = s.identifiant'
									);
						$query3 = $bdd->query('SELECT a.identifiant, a.titre, a.auteur, p.prenom, p.nom, a.mot_cle, a.annee, a.revue, o.nom AS nom_locus, l.langue AS nom_langue, a.commentaire, a.type_sujet, a.sujet
									FROM article a, personne p, langue l, locus o
									WHERE a.auteur = p.identifiant
									AND a.langue = l.identifiant
									AND a.sujet = o.identifiant'
									);
					?>

					<!-- Tableau d'affichage de la table. -->
					<table>
						<caption>ARTICLE</caption>

						<!-- Entête du tableau. -->
						<thead>
							<tr>
								<th>titre</th>
								<th>auteur</th>
								<th>revue</th>
								<th>sujet</th>
								<th>type sujet</th>
								<th>langue</th>
								<th>année</th>
								<th>mots clé</th>
								<th>commentaires</th>
							</tr>
						</thead>

						<!-- Pied du tableau. -->
						<tfoot>
							<tr>
								<th>titre</th>
								<th>auteur</th>
								<th>revue</th>
								<th>sujet</th>
								<th>type sujet</th>
								<th>langue</th>
								<th>année</th>
								<th>mots clé</th>
								<th>commentaires</th>
							</tr>
						</tfoot>

						<!-- Corps du tableau. -->
						<tbody>

							<?php
								while ($data = $query1->fetch()) {
							?>

								<tr>
									<td><?php echo $data['titre']; ?></td>
									<td><?php echo $data['prenom'] . ' ' . $data['nom']; ?></td>
									<td><?php echo $data['revue']; ?></td>
									<td><?php echo $data['nom_region']; ?></td>
									<td><?php echo $data['type_sujet']; ?></td>
									<td><?php echo $data['nom_langue']; ?></td>
									<td><?php echo $data['annee']; ?></td>
									<td><?php echo $data['mot_cle']; ?></td>
									<td><?php echo $data['commentaire']; ?></td>
								</tr>

							<?php
								}
								$query1->closeCursor();
								while ($data = $query2->fetch()) {
							?>

								<tr>
									<td><?php echo $data['titre']; ?></td>
									<td><?php echo $data['prenom'] . ' ' . $data['nom']; ?></td>
									<td><?php echo $data['revue']; ?></td>
									<td><?php echo $data['nom_site']; ?></td>
									<td><?php echo $data['type_sujet']; ?></td>
									<td><?php echo $data['nom_langue']; ?></td>
									<td><?php echo $data['annee']; ?></td>
									<td><?php echo $data['mot_cle']; ?></td>
									<td><?php echo $data['commentaire']; ?></td>
								</tr>

							<?php
								}
								$query->closeCursor();
								while ($data = $query3->fetch()) {
							?>

								<tr>
									<td><?php echo $data['titre']; ?></td>
									<td><?php echo $data['prenom'] . ' ' . $data['nom']; ?></td>
									<td><?php echo $data['revue']; ?></td>
									<td><?php echo $data['nom_locus']; ?></td>
									<td><?php echo $data['type_sujet']; ?></td>
									<td><?php echo $data['nom_langue']; ?></td>
									<td><?php echo $data['annee']; ?></td>
									<td><?php echo $data['mot_cle']; ?></td>
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
