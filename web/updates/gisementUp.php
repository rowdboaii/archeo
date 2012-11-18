<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : gisementUp.php -->

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
		<title>GisementUp</title>
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
						$query2 = $bdd->prepare('SELECT g.identifiant, g.nom, r.nom AS nom_region, g.position_nord, g.position_est, g.altitude, g.commentaire
													FROM gisement g, region r
													WHERE g.region = r.identifiant'
													);
					?>

					<p>
						<!-- Formulaire sur le choix du champ à modifier. -->
						<form method = "post" action = "gisementUp.php">
							<p>
								<label for = "champ">Champ à modifier</label> : 
								<select name = "champ" id = "champ">
									<option value = "0"></option>
									<option value = "nom">nom</option>
									<option value = "region">région</option>
									<option value = "position_nord">position nord</option>
									<option value = "position_est">position est</option>
									<option value = "altitude">altitude</option>
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
						<!-- Formulaire pour l'Update d'un Gisement. -->
						<form method = "post" action = "../exec/gisementUpdate.php">
							<p>
								<?php if ($_SESSION['champ'] == "nom") { ?>
									<label for = "old">Nom</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query2->execute();
											while ($data = $query2->fetch()) {
												echo '<option value ="' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<input type = "text" name = "new" id = "new" /><br />
								<?php } ?>
								
								<?php> if ($_SESSION['champ'] == "region") { ?>
									<label for = "old">Region</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query2->execute();
											while ($data = $query2->fetch()) {
												echo '<option value ="' . $data['identifiant'] . '">' . $data['nom_region'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<select name = "new" id = "new">
										<option value = "0"></option>
										<?php
											$query1->execute();
											while ($data = $query1->fetch()) {
												echo '<option value ="' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
											}
										?>
									</select><br />
								<?php } ?>
								
								<?php> if ($_SESSION['champ'] == "position_nord") { ?>
									<label for = "old">Position Nord</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query2->execute();
											while ($data = $query2->fetch()) {
												echo '<option value ="' . $data['identifiant'] . '">' . $data['position_nord'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<input type = "text" name = "new" id = "new" /><br />
								<?php } ?>
								
								<?php> if ($_SESSION['champ'] == "position_est") { ?>
									<label for = "old">Position Est</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query2->execute();
											while ($data = $query2->fetch()) {
												echo '<option value ="' . $data['identifiant'] . '">' . $data['position_est'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<input type = "text" name = "new" id = "new" /><br />
								<?php } ?>
								
								<?php> if ($_SESSION['champ'] == "altitude") { ?>
									<label for = "old">Altitude</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query2->execute();
											while ($data = $query2->fetch()) {
												echo '<option value ="' . $data['identifiant'] . '">' . $data['altitude'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label>
									<input type = "text" name = "new" id = "new" /><br />
								<?php } ?>
							
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>
					<?php } ?>
					
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
