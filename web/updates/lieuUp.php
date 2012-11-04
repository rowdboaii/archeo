<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : lieuUp.php -->

<!-- Démarrage de la session pour les identifiants. -->
<?php session_start(); ?>

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
		<title>LieuUp</title>
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
						/* Connexion à la base de données. */
						include('../includes/connexionBDD.php');

						/* Récupération des données pour le formulaire. */
						$query1 = $bdd->prepare('SELECT identifiant, nom
																			FROM region'
																		 	);
						$query2 = $bdd->prepare('SELECT l.identifiant, l.nom, r.nom AS nom_region, l.position_nord, l.position_est, l.altitude, l.commentaire
																			FROM lieu l, region r
																			WHERE l.region = r.identifiant'
																			);
					?>

					<p>
						<!-- Formulaire pour l'Update d'un Lieu. -->
						<form method = "post" action = "../exec/lieuUpdate.php">
							<p>
								<label for = "old_nom">Nom</label> : 
								<select name = "old_nom" id = "old_nom">
									<option value = "0"></option>
									<?php
										$query2->execute();
										while ($data = $query2->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select>
								<label for = "new_nom"> remplacé par</label> : 
								<input type = "text" name = "new_nom" id = "new_nom" /><br />
								<label for = "old_region">Région</label> : 
								<select name = "old_region" id = "old_region">
									<option value = "0"></option>
									<?php
										$query2->execute();
										while ($data = $query2->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom_region'] . '</option>';
										}
									?>
								</select>
								<label for = "new_region"> remplacé par</label> : 
								<select name = "new_region" id = "new_region">
									<option value = "0"></option>
									<?php
										$query1->execute();
										while ($data = $query1->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select><br />
								<label for = "nord">Position Nord</label> : <input type = "text" name = "nord" id = "nord" /><br />
								<label for = "est">Position Est</label> : <input type = "text" name = "est" id = "est" /><br />
								<label for = "altitude">Altitude</label> : <input type = "text" name = "altitude" id = "altitude" /><br />
								<label for = "commentaire">Commentaire</label> :<br />
								<textarea name = "commentaire" id = "commentaire" rows = "5" cols = "40"></textarea><br />
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
