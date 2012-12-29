<!-- Sujet : Projet de base de données pour des fouilles archéogiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : personneUp.php -->

<!-- Démarrage de la session pour les identifiants. -->
<?php session_start(); ?>

<!DOCTYPE html>
<html>

	<head>
		<!-- En-tête de la page. -->
		<meta charset = "utf-8" />
		<link rel = "stylesheet" href = "../styles/style.css" />
		<!-- Dans le cas où le navigateur est une version antéeure à IE9 -->
		<!--[if lt IE9]>
			<script src = "http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<title>PersonneUp</title>
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
					<?php include('../includes/menuMain2.php'); ?>

				</div>
			</nav>

			<aside>
				<!-- Menu latéral spéfique au lien visité. -->
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
						/* Connexion àa base de données. */
						include('../includes/connexionBDD.php');

						/* Récupération des données pour le formulaire. */
						$query1 = $bdd->prepare('SELECT identifiant, nationalite
										FROM nationalite'
										);
						$query2 = $bdd->prepare('SELECT identifiant, fonction
										FROM fonction'
										);
						$query3 = $bdd->prepare('SELECT p.identifiant, p.prenom, p.nom, n.nationalite AS nationalite_nom, f.fonction AS fonction_nom, p.nationalite, p.fonction
										FROM personne p, nationalite n, fonction f
										WHERE p.nationalite = n.identifiant
										AND p.fonction = f.identifiant'
										);
					?>

					<p>
						<!-- Formulaire sur le choix du champ à modifier. -->
						<form method = "post" action = "personneUp.php">
							<p>
								<label for = "champ">Champ à modifier</label> :
								<select name = "champ" id = "champ">
									<option value = "0"></option>
									<option value = "prenom">prénom</option>
									<option value = "nom">nom</option>
									<option value = "nationalite">nationalité</option>
									<option value = "fonction">fonction</option>
								</select><br />
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>

					<?php
						/* Récupération du champ à modifier. */
						$_SESSION['champ'] = 0;
						if (isset($_POST['champ'])) {
							$_SESSION['champ'] = $_POST['champ'];
						}

						/* Affichage du champ souhaité. */
						if ($_SESSION['champ'] != '0') {
					?>

					<p>
						<!-- Formulaire pour l'Update d'une Personne. -->
						<form method = "post" action = "../exec/personneUpdate.php">
							<p>
								<?php if ($_SESSION['champ'] == "prenom") { ?>
									<label for = "old">Prénom</label> :
									<select name = "old" id = "old">
										<option value = "0"></option>4
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value ="' . $data['prenom'] . '">' . $data['prenom'] . ' ' . $data['nom'] . ' : ' . $data['prenom'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> :
									<input type = "text" name = "new" id = "new" /><br />
								<?php } ?>

								<?php if ($_SESSION['champ'] == "nom") { ?>
									<label for = "old">Nom</label> :
									<select name = "old" id = "old">
										<option value = "0"></option>4
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value ="' . $data['nom'] . '">' . $data['prenom'] . ' ' . $data['nom'] . ' : ' . $data['nom'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> :
									<input type = "text" name = "new" id = "new" /><br />
								<?php } ?>

								<?php if ($_SESSION['champ'] == "nationalite") { ?>
									<label for = "old">Nationalité</label> :
									<select name = "old" id = "old">
										<option value = "0"></option>4
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value ="' . $data['nationalite'] . '">' . $data['prenom'] . ' ' . $data['nom'] . ' : ' . $data['nationalite_nom'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> :
									<select name = "new" id = "new">
										<option value = "0"></option>4
										<?php
											$query1->execute();
											while ($data = $query1->fetch()) {
												echo '<option value ="' . $data['identifiant'] . '">' . $data['nationalite'] . '</option>';
											}
										?>
									</select>
									<a href = "../parameters/nationalite.php">Ajouter une nouvelle Nationalité ?</a><br />
								<?php } ?>

								<?php if ($_SESSION['champ'] == "fonction") { ?>
									<label for = "old">Fonction</label> :
									<select name = "old" id = "old">
										<option value = "0"></option>4
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value ="' . $data['fonction'] . '">' . $data['prenom'] . ' ' . $data['nom'] . ' : ' . $data['fonction_nom'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> :
									<select name = "new" id = "new">
										<option value = "0"></option>4
										<?php
											$query2->execute();
											while ($data = $query2->fetch()) {
												echo '<option value ="' . $data['identifiant'] . '">' . $data['fonction'] . '</option>';
											}
										?>
									</select>
									<a href = "../parameters/fonction.php">Ajouter une nouvelle Fonction ?</a><br />
								<?php } ?>

								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>
					<?php } ?>

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
