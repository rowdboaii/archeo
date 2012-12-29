<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : lieuIn.php -->

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
		<title>LieuIn</title>
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
						$query = $bdd->prepare('SELECT identifiant, nom
									FROM region'
								 	);
					?>

					<p>
						<!-- Formulaire pour un Lieu. -->
						<form method = "post" action = "../exec/lieuInsert.php">
							<p>
								<label for = "nom">Nom</label> :
								<input type = "text" name = "nom" id = "nom" /><br />
								<label for = "region">Région</label> :
								<select name = "region" id = "region">
									<?php
										$query->execute();
										while ($data = $query->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select>
								<a href = "regionIn.php">Ajouter une nouvelle Région ?</a><br />
								<label for = "nord">Position Nord</label> :
								<input type = "text" name = "nord" id = "nord" /> (number)<br />
								<label for = "est">Position Est</label> :
								<input type = "text" name = "est" id = "est" /> (number)<br />
								<label for = "altitude">Altitude</label> :
								<input type = "text" name = "altitude" id = "altitude" /> (number)<br />
								<label for = "commentaire">Commentaires</label> :<br />
								<textarea name = "commentaire" id = "commentaire" rows = "10" cols = "80"></textarea><br />
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>

					<?php	$query->closeCursor(); ?>

				</div>
			</section>
			<?php } ?>

			<footer>

				<!-- Pied de la page. -->
				<?php include('..includes/piedPage.php'); ?>

			</footer>

		</div>
	</body>

</html>
