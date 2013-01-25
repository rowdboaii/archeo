<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : objetInsert.php -->

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
		<title>ObjetInsert</title>
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

				</div>
			</nav>

			<aside>
				<!-- Menu latéral spécifique au lien visité. -->
				<div id = "">

				</div>
			</aside>
			<section>

				<!-- Section de page. -->
				<div id = "">

					<?php
						if ($_POST['type_recherche'] == ' ') {

							$query = $bdd->prepare('INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, brule, periode, tamis, trouve_par, collection, type_recherche, commentaire)
										VALUES (:nom, :type, :poids, :longueur, :largeur, :hauteur, :nature, :brule, :periode, :tamis, :trouve_par, :collection, :type_recherche, :commentaire)'
										);
						
							$query->execute(array('nom' => $_POST['nom'],
										'type' => $_POST['type'],
										'poids' => $_POST['poids'],
										'longueur' => $_POST['longueur'],
										'largeur' => $_POST['largeur'],
										'hauteur' => $_POST['hauteur'],
										'nature' => $_POST['nature'],
										'brule' => $_POST['brule'],
										'periode' => $_POST['periode'],
										'tamis' => $_POST['tamis'],
										'trouve_par' => $_POST['trouve_par'],
										'collection' => $_POST['collection'],
										'type_recherche' => $_POST['type_recherche'],
										'commentaire' => $_POST['commentaire']
									)) or die('Error');
							echo 'Champ ajouté à la base.';
						}
						else {
							$query = $bdd->prepare('INSERT INTO objet (nom, type, poids, longueur, largeur, hauteur, nature, brule, periode, tamis, trouve_par, collection, type_recherche, recherche, commentaire)
										VALUES (:nom, :type, :poids, :longueur, :largeur, :hauteur, :nature, :brule, :periode, :tamis, :trouve_par, :collection, :type_recherche, :recherche, :commentaire)'
										);

							if ($_POST['type_recherche'] == 'prospection') {
								$query->execute(array('nom' => $_POST['nom'],
											'type' => $_POST['type'],
											'poids' => $_POST['poids'],
											'longueur' => $_POST['longueur'],
											'largeur' => $_POST['largeur'],
											'hauteur' => $_POST['hauteur'],
											'nature' => $_POST['nature'],
											'brule' => $_POST['brule'],
											'periode' => $_POST['periode'],
											'tamis' => $_POST['tamis'],
											'trouve_par' => $_POST['trouve_par'],
											'collection' => $_POST['collection'],
											'type_recherche' => $_POST['type_recherche'],
											'recherche' => $_POST['prospection'],
											'commentaire' => $_POST['commentaire']
										)) or die('Error');
								echo 'Champ ajouté à la base.';
							}
							else {
								$query->execute(array('nom' => $_POST['nom'],
											'type' => $_POST['type'],
											'poids' => $_POST['poids'],
											'longueur' => $_POST['longueur'],
											'largeur' => $_POST['largeur'],
											'hauteur' => $_POST['hauteur'],
											'nature' => $_POST['nature'],
											'brule' => $_POST['brule'],
											'periode' => $_POST['periode'],
											'tamis' => $_POST['tamis'],
											'trouve_par' => $_POST['trouve_par'],
											'collection' => $_POST['collection'],
											'type_recherche' => $_POST['type_recherche'],
											'recherche' => $_POST['fouille'],
											'commentaire' => $_POST['commentaire']
										)) or die('Error');
								echo 'Champ ajouté à la base.';
							}
						}




					?>

					<!-- Lien de retour vers la page des inputs. -->
					<p>
						<a href = "../input.php">Revenir</a>
					</p>

				</div>
			</section>

			<footer>

				<!-- Pied de la page. -->
				<?php include('../includes/piedPage.php'); ?>

			</footer>

		</div>
	</body>

</html>
