﻿<!-- Sujet : Projet de base de données pour des fouilles archéogiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : silexUp.php -->

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
		<title>SilexUp</title>
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

					<!-- Menu pour les Updates. -->
					<?php include('../includes/menuUp.php'); ?>

				</div>
			</aside>

			<?php if ($_SESSION['pseudo'] == 'sudo') { ?>

			<section>
				<!-- Section de page. -->
				<div id = "">

					<?php
						/* Connexion à base de données. */
						include('../includes/connexionBDD.php');

						/* Répération des données pour le formulaire. */
						$query1 = $bdd->prepare('SELECT o.identifiant, o.nom
										FROM objet o, objetnature n
										WHERE o.nature = n.identifiant
										AND n.nature = \'silex\''
										);
						$query2 = $bdd->prepare('SELECT identifiant, nom
										FROM gisement'
										);
						$query3 = $bdd->prepare('SELECT o.nom AS nom_objet, g.nom AS nom_gisement, s.couleur, s.objet, s.provenance
										FROM silex s, gisement g, objet o
										WHERE s.provenance = g.identifiant
										AND s.objet = o.identifiant'
										);
						$query4 = $bdd->prepare('SELECT o.nom AS nom_objet, g.nom AS nom_gisement, s.couleur,
										FROM silex s, gisement g, objet o
										WHERE s.provenance = g.identifiant
										AND s.objet = o.identifiant
										AND s.objet = :objet'
										);
					?>

					<p>
						<!-- Formulaire sur le choix du Silex à modifier. -->
						<form method = "post" action = "silexUp.php">
							<p>
								<label for = "updating">Silex à modifier</label> :
								<select name = "updating" id = "updating">
									<option value = "0"></option>
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value = "' . $data['objet'] . '">' . $data['nom_objet'] . '</option>';
										}
									?>
								</select><br />
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>

					<?php
						/* Récupération du Silex à modifier. */
						if (isset($_POST['updating'])) {
							$_SESSION['updating'] = $_POST['updating'];
							$_SESSION['temp'] = $_SESSION['updating'];
						}
						else {
							if (isset($_SESSION['temp'])) {
								$_SESSION['updating'] = $_SESSION['temp'];
							}
							else {
								$_SESSION['updating'] = 0;
							}
						}

						/* Affichage du Silex souhaité. */
						if ($_SESSION['updating'] != '0') {

							$query4->execute(array('objet' => $_SESSION['updating']));
					?>

					<p>
						<!-- Tableau d'affichage de la table. -->
						<table>
							<caption>SILEX</caption>

							<!-- Entête du tableau. -->
							<thead>
								<tr>
									<th>objet</th>
									<th>provenance</th>
									<th>couleur</th>
								</tr>
							</thead>

							<!-- Corps du tableau. -->
							<tbody>
								<?php $data = $query4->fetch(); ?>

								<tr>
									<td><?php echo $data['nom_objet']; ?></td>
									<td><?php echo $data['nom_gisement']; ?></td>
									<td><?php echo $data['couleur']; ?></td>
								</tr>

							</tbody>
						</table>
					</p>

					<p>
						<!-- Formulaire sur le choix du champ à modifier. -->
						<h1>Update</h1>
						<form method = "post" action = "silexUp.php">
							<p>
								<label for = "champ">Champ à modifier</label> :
								<select name = "champ" id = "champ">
									<option value = "0"></option>
									<option value = "provenance">provenance</option>
									<option value = "couleur">couleur</option>
								</select><br />
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>

					<?php
						/* Récupération du champ à modifier. */
						if (isset($_POST['champ'])) {
							$_SESSION['champ'] = $_POST['champ'];
						}
						else {
							$_SESSION['champ'] = 0;
						}
						/* Affichage du champ souhaité. */
						if ($_SESSION['champ'] != '0') {
					?>

					<p>
						<!-- Formulaire pour l'Update d'un Silex. -->
						<form method = "post" action = "../exec/silexUpdate.php">
							<p>
								<?php
									if ($_SESSION['champ'] == "provenance") {
										$data = $query4->fetch()
										echo 'Provenance : ' . $data['nom_gisement'];
								?>
								<label for = "new"> remplacé par</label> :
								<select name = "new" id = "new">
									<option value = "0"></option>
									<?php
										$query2->execute();
										while ($data = $query2->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select>
								<a href = "../inputs/gisementIn.php">Ajouter un nouveau Gisement ?</a><br />
								<?php } ?>

								<?php
									if ($_SESSION['champ'] == "couleur") {
										$data = $query4->fetch()
										echo 'Couleur : ' . $data['couleur'];
								?>
								<label for = "new"> remplacé par</label> :
								<input type = "text" name = "new" id = "new" /><br />
								<?php } ?>

								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>
					<?php } ?>
					<?php } ?>

					<?php
						$query1->closeCursor();
						$query2->closeCursor();
						$query3->closeCursor();
						$query4->closeCursor();
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
