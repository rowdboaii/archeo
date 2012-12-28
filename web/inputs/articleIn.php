<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : articleIn.php -->

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
		<title>ArticleIn</title>
	</head>

	<body>
	  <!-- Corps de la page. -->
		<div id = "">

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

					<!-- Menu pour les inputs. -->
					<?php include('../includes/menuIn.php'); ?>

				</div>
			</aside>

			<?php if ($_SESSION['pseudo'] == 'sudo') { ?>

			<section>
				<!-- Section de page. -->
				<div id = "">

					<?php
						/* Connexion à la base de données. */
						include('../includes/connexionBDD.php');

						/* Récupération des données pour le formulaire. */
						$query1 = $bdd->prepare('SELECT identifiant, prenom, nom
										FROM personne'
									 	);
						$query2 = $bdd->prepare('SELECT identifiant, nom
										FROM locus'
										);
						$query3 = $bdd->prepare('SELECT identifiant, langue
										FROM langue'
										);
						$query4 = $bdd->prepare('SELECT identifiant, nom
										FROM region'
										);
						$query5 = $bdd->prepare('SELECT identifiant, nom
										FROM site'
										);
					?>

					<p>
						<!-- Formulaire pour un Article. -->
						<form method = "post" action = "../exec/articleInsert.php">
							<p>
								<label for = "titre">Titre</label> :
								<input type = "text" name = "titre" id = "titre" /><br />
								<label for = "revue">Revue</label> :
								<input type = "text" name = "revue" id = "revue" /><br />
								<label for = "auteur">Auteur</label> :
								<select name = "auteur" id = "auteur">
									<?php
										$query1->execute();
										while ($data = $query1->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom'] . ' ' . $data['nom'] . '</option>';
										}
									?>
								</select>
								<a href = "personneIn.php">Ajouter une nouvelle Personne ?</a><br />
								<label for = "type_sujet">Type de sujet</label> :
								<select name = "type_sujet" id = "type_sujet">
									<option value = "locus">locus</option>
									<option value = "region">region</option>
									<option value = "site">site</option>
								</select><br />
								<label for = "sujet">Sujet</label> :
								<select name = "sujet" id = "sujet">
									<?php
										$query2->execute();
										while ($data = $query2->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . 'Locus ' . $data['nom'] . '</option>';
										}
										$query4->execute();
										while ($data = $query4->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . 'Région ' . $data['nom'] . '</option>';
										}
										$query5->execute();
										while ($data = $query5->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . 'Site ' . $data['nom'] . '</option>';
										}
									?>
								</select>
								<a href = "locusIn.php">Ajouter un nouveau Locus ?</a>
								<a href = "regionIn.php">une nouvelle Région ?</a>
								<a href = "siteIn.php">un nouveau site ?</a><br />
								<label for = "annee">Année</label> :
								<input type = "date" name = "annee" id = "annee" /> (jj/mm/aaaa)<br />
								<label for = "langue">Langue</label> :
								<select name = "langue" id = "langue">
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['langue'] . '</option>';
										}
									?>
								</select>
								<a href = "../parameters/langue.php">Ajouter une nouvelle Langue ?</a><br />
								<label for = "mots_cle">Mots clé</label> :<br />
								<textarea name = "mots_cle" id = "mots_cle" rows = "10" cols = "80"></textarea><br />
								<label for = "commentaire">Commentaires</label> :<br />
								<textarea name = "commentaire" id = "commentaire" rows = "10" cols = "80"></textarea><br />
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>

					<?php
						$query1->closeCursor();
						$query2->closeCursor();
						$query3->closeCursor();
					?>

				</div>
			</section>
			<?php } ?>

			<footer>

				<!-- Pied de la page. -->
				<?php include('../includes/piedPage.php'); ?>

			</footer>

		</div>
	</body>

</html>
