<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
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
					?>

					<p>
						<!-- Formulaire pour un Article. -->
						<form method = "post" action = "../exec/articleInsert.php">
							<p>
								<label for = "titre">Titre</label> : <input type = "text" name = "titre" id = "titre" /><br />
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
								<label for = "revue">Revue</label> : <input type = "text" name = "revue" id = "revue" /><br />
								<label for = "sujet">Sujet</label> : 
								<select name = "sujet" id = "sujet">
									<?php
										$query2->execute();
										while ($data = $query2->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select> 
								<a href = "locusIn.php">Ajouter un nouveau Locus ?</a><br />
								<label for = "annee">Année</label> : <input type = "text" name = "annee" id = "annee" /><br />
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
								<input type = "text" name = "mots_cle" id = "mots_cle" width = "30px" height = "5" /><br />
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
