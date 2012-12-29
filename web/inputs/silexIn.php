<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : silexIn.php -->

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
		<title>SilexIn</title>
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
						$query1 = $bdd->prepare('SELECT o.identifiant, o.nom
										FROM objet o, objetnature n
										WHERE o.nature = n.identifiant
										AND n.nature = \'silex\''
									 	);
						$query2 = $bdd->prepare('SELECT identifiant, nom
										FROM gisement'
										);
					?>

					<p>
						<!-- Formulaire pour un Silex. -->
						<form method = "post" action = "../exec/silexInsert.php">
							<p>
								<label for = "objet">Objet</label> :
								<select name = "objet" id = "objet">
									<?php
										$query1->execute();
										while ($data = $query1->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select>
								<a href = "objetIn.php">Ajouter un nouvel objet ?</a><br />
								<label for = "couleur">Couleur</label> :
								<input type = "text" name = "couleur" id = "couleur" /><br />
								<label for = "provenance">Provenance</label> :
								<select name = "provenance" id = "provenance">
									<?php
										$query2->execute();
										while ($data = $query2->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select>
								<a href = "gisementIn.php">Ajouter un nouveau Gisement ?</a><br />
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
