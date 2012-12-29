<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : collectionUp.php -->

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
		<title>CollectionUp</title>
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
						/* Connexion à la base de données. */
						include('../includes/connexionBDD.php');

						/* Récupération des données pour le formulaire. */
						$query1 = $bdd->prepare('SELECT p.prenom, p.nom, p.identifiant
										FROM personne p'
										);
						$query2 = $bdd->prepare('SELECT c.identifiant, p.prenom, c.nom, p.nom AS nom_personne, c.proprietaire
										FROM collection c, personne p
										WHERE c.proprietaire = p.identifiant'
										);
					?>

					<p>
						<!-- Formulaire sur le choix du champ à modifier. -->
						<form method = "post" action = "collectionUp.php">
							<p>
								<label for = "champ">Champ à modifier</label> :
								<select name = "champ" id = "champ">
									<option value = "0"></option>
									<option value = "nom">nom</option>
									<option value = "proprietaire">propriétaire</option>
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
						<!-- Formulaire pour l'Update d'une Collection. -->
						<form method = "post" action = "../exec/collectionUpdate.php">
							<p>
								<?php if ($_SESSION['champ'] == "nom") { ?>
									<label for = "old">Nom</label> :
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query2->execute();
											while ($data = $query2->fetch()) {
												echo '<option value = "' . $data['nom'] . '">' . $data['nom'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> :
									<input type = "text" name = "new" id = "new" /><br />
								<?php } ?>

								<?php if ($_SESSION['champ'] == "proprietaire") { ?>
									<label for = "old">Propriétaire</label> :
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query2->execute();
											while ($data = $query2->fetch()) {
												echo '<option value = "' . $data['proprietaire'] . '">' . $data['nom'] . ' : ' . $data['prenom'] . ' ' . $data['nom_personne'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> :
									<select name = "new" id = "new">
										<option value = "0"></option>
										<?php
											$query1->execute();
											while ($data = $query1->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom'] . ' ' . $data['nom'] . '</option>';
											}
										?>
									</select>
									<a href = "../inputs/personneIn.php">Ajouter une nouvelle Personne ?</a><br />
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
