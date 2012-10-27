<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : articleIn.php -->

<!-- Démarrage de la session pour les identifiants. -->
<?php	session_start(); ?>

<!DOCTYPE html>
<html>

	<head>
		<!-- En-tête de la page. -->
		<meta charset = "utf-8" />
		<link rel = "stylesheet" href = "style.css" />
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
						$query1 = $bdd->prepare('SELECT p.identifiant AS id_personne, p.prenom, p.nom, a.sujet
																			FROM article a, personne p
																			WHERE a.auteur = p.identifiant'
																		 	);
						$query2 = $bdd->prepare('SELECT identifiant, langue
																			FROM langue'
																			);
					?>

					<p>
						<!-- Formulaire pour un Article. -->
						<form method = "post" action = "../inserts/articleInsert.php">
							<p>
								<label for = "titre">Titre</label> : <input type = "text" name = "titre" id = "titre" /><br />
								<label for = "auteur">Auteur</label> : 
								<select name = "auteur" id = "auteur">
									<?php
										$query1->execute();
										while ($data = $query1->fetch()) {
											echo '<option value = "' . $data['id_personne'] . '">' . $data['prenom'] . ' ' . $data['nom'] . '</option>';
										}
									?>
								</select><br />
								<label for = "revue">Revue</label> : <input type = "text" name = "revue" id = "revue" /><br />
								<label for = "sujet">Sujet</label> : 
								<select name = "sujet" id = "sujet">
									<?php
										$query1->execute();
										while ($data = $query1->fetch()) {
											echo '<option value = "' . $data['sujet'] . '">' . $data['sujet'] . '</option>';
										}
									?>
								</select><br />
								<label for = "annee">Année</label> : <input type = "text" name = "annee" id = "annee" /><br />
								<label for = "langue">Langue</label> : 
								<select name = "langue" id = "langue">
									<?php
										$query2->execute();
										while ($data = $query2->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['langue'] . '</option>';
										}
									?>
								</select><br />
								<label for = "mots_cle">Mots clé</label> :<br />
								<textarea name = "mots_cle" id = "mots_cle" rows = "5" cols = "40"></textarea><br />
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
