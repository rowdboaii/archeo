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
						<!-- Formulaire sur le choix du champ à modifier. -->
						<form method = "post" action = "lieuUp.php">
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
						if ($champ != 0) {
					?>

					<p>
						<!-- Formulaire pour l'Update d'un Lieu. -->
						<form method = "post" action = "../exec/lieuUpdate.php">
							<p>
								<?php if ($champ == "nom") { ?>
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
								<?php } ?>
								
								<?php> if ($champ == "region") { ?>
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
								<?php } ?>
								
								<?php> if ($champ == "position_nord") { ?>
									<label for = "old_nord">Position nord</label> : 
									<select name = "old_nord" id = "old_nord">
										<option value = "0"></option>
										<?php
											$query2->execute();
											while ($data = $query2->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['position_nord'] . '</option>';
											}
										?>
									</select>
									<label for = "new_nord"> remplacé par</label> : 
									<input type = "text" name = "new_nord" id = "new_nord" /><br />
								<?php } ?>
								
								<?php> if ($champ == "position_est") { ?>
									<label for = "old_est">Position est</label> : 
									<select name = "old_est" id = "old_est">
										<option value = "0"></option>
										<?php
											$query2->execute();
											while ($data = $query2->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['position_est'] . '</option>';
											}
										?>
									</select>
									<label for = "new_est"> remplacé par</label> : 
									<input type = "text" name = "new_est" id = "new_est" /><br />
								<?php } ?>
								
								<?php> if ($champ == "altitude") { ?>
									<label for = "old_altitude">Altitude</label> : 
									<select name = "old_altitude" id = "old_altitude">
										<option value = "0"></option>
										<?php
											$query2->execute();
											while ($data = $query2->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['altitude'] . '</option>';
											}
										?>
									</select>
									<label for = "new_altitude"> remplacé par</label> : 
									<input type = "text" name = "new_altitude" id = "new_altitude" /><br />
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
