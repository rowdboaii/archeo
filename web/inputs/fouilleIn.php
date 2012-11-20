<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : fouilleIn.php -->

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
		<title>FouilleIn</title>
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
					<?php include('../includes/MenuMain.php'); ?>

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
						$query1 = $bdd->prepare('SELECT d.identifiant, d.nom
										FROM decapage d'
									 	);
						$query2 = $bdd->prepare('SELECT p.nom, p.prenom, p.identifiant
										FROM personne p'
										);
					?>

					<p>
						<!-- Formulaire pour une Fouille. -->
						</p><form method = "post" action = "../exec/fouilleInsert.php">
							<p>
								<label for = "nom">Nom</label> : <input type = "text" name = "nom" id = "nom"><br>
								<label for = "decapage">Décapage</label> : 
								<select name = "decapage" id = "decapage">
									<?php
										$query1->execute();
										while ($data = $query1->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select> 
								<a href = "decapageIn.php">Ajouter un nouveau Décapage ?</a><br>
								<label for = "fouilleur">Fouilleur</label> : 
								<select name = "fouilleur" id = "fouilleur">
									<?php
										$query2->execute();
										while ($data = $query2->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom'] . ' ' . $data['nom'] . '</option>';
										}
									?>
								</select> 
								<a href = "personneIn.php">Ajouter une nouvelle Personne ?</a><br>
								<label for = "annee">Année</label> : <input type = "date" name = "annee" id = "annee"><br>
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
