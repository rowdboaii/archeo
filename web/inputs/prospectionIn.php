<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : prospectionIn.php -->

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
		<title>ProspectionIn</title>
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
						$query1 = $bdd->prepare('SELECT identifiant, nom
										FROM lieu'
									 	);
						$query2 = $bdd->prepare('SELECT identifiant, prenom, nom
										FROM personne'
										);
					?>

					<p>
						<!-- Formulaire pour une Prospection. -->
						<form method = "post" action = "../exec/prospectionInsert.php">
							<p>
								<label for = "nom">Nom</label> :
								<input type = "text" name = "nom" id = "nom" /><br />
								<label for = "date">Date Prospection</label> :
								<input type = "date" name = "date" id = "date" /> (jj/mm/aaaa)<br />
								<label for = "lieu">Lieu</label> :
								<select name = "lieu" id = "lieu">
									<?php
										$query1->execute();
										while ($data = $query1->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select>
								<a href = "lieuIn.php">Ajouter un nouveau Lieu ?</a><br />
								<label for = "responsable">Responsable</label> :
								<select name = "responsable" id = "responsable">
									<?php
										$query2->execute();
										while ($data = $query2->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['prenom'] . ' ' . $data['nom'] . '</option>';
										}
									?>
								</select>
								<a href = "personneIn.php">Ajouter une nouvelle Personne ?</a><br />
								<label for = "commentaire">Commentaires</label> :<br />
								<textarea name = "commentaire" id = "commentaire" rows = "10" cols = "80"></textarea><br />
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>

					<?php
						$query1->closeCursor();
						$query2->closeCursor();
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
