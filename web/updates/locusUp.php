<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : locusUp.php -->

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
		<title>locusUp</title>
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
						$query1 = $bdd->prepare('SELECT identifiant, type
													FROM locusType'
													);
						$query2 = $bdd->prepare('SELECT identifiant, nom
													FROM site'
													);
						$query3 = $bdd->prepare('SELECT identifiant, prenom, nom
													FROM personne'
													);
						$query4 = $bdd->prepare('SELECT l.identifiant, l.nom, s.nom AS nom_site, t.type AS nom_type, l.position_nord, l.position_est, 
													l.altitude, f.prenom AS prenom_f,f.nom AS nom_f, p.prenom AS prenom_p, p.nom AS nom_p
													FROM locus l, site s, locustype t, personne p, personne f
													WHERE l.site = s.identifiant
													AND l.type = t.identifiant
													AND l.trouve_par = f.identifiant
													AND l.appartient_a = p.identifiant'
													);
					?>

					<p>
						<!-- Formulaire sur le choix du champ à modifier. -->
						<form method = "post" action = "locusUp.php">
							<p>
								<label for = "champ">Champ à modifier</label> : 
								<select name = "champ" id = "champ">
									<option value = "0"></option>
									<option value = "nom">nom</option>
									<option value = "site">site</option>
									<option value = "type">type</option>
									<option value = "position_nord">position nord</option>
									<option value = "position_est">position est</option>
									<option value = "altitude">altitude</option>
									<option value = "trouve_par">trouvé par</option>
									<option value = "appartient_a">appartient à</option>
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
						<!-- Formulaire pour l'Update d'un Locus. -->
						<form method = "post" action = "../exec/locusUpdate.php">
							<p>
								<?php if ($_SESSION['champ'] == "nom") { ?>
									<label for = "old">Nom</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query4->execute();
											while ($data = $query4->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<input type = "text" name = "new" id = "new" /><br />
								<?php } ?>
								
								<?php> if ($_SESSION['champ'] == "site") { ?>
									<label for = "old">Site</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query4->execute();
											while ($data = $query4->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['nom_site'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label>
									<select name = "new" id = "new">
										<option value = "0"></option>
										<?php
											$query2->execute();
											while ($data = $query2->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
											}
										?>
									</select><br />
								<?php } ?>
								
								<?php> if ($_SESSION['champ'] == "type") { ?>
									<label for = "old">Type</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query4->execute();
											while ($data = $query4->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['nom_type'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<select name = "new" id = "new">
										<option value = "0"></option>
										<?php
											$query1->execute();
											while ($data = $query1->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['type'] . '</option>';
											}
										?>
									</select><br />
								<?php } ?>
								
								<?php> if ($_SESSION['champ'] == "position_nord") { ?>
									<label for = "old">Position Nord</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query4->execute();
											while ($data = $query4->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['position_nord'] . '</option>';
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
											$query4->execute();
											while ($data = $query4->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['position_est'] . '</option>';
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
											$query4->execute();
											while ($data = $query4->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['altitude'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<input type = "text" name = "new" id = "new" /><br />
								<?php } ?>
								
								<?php> if ($_SESSION['champ'] == "trouve_par") { ?>
									<label for = "old">Trouvé par</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query4->execute();
											while ($data = $query4->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom_f'] . ' ' . $data['nom_f'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<select name = "new" id = "new">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom'] . ' ' . $data['nom'] . '</option>';
											}
										?>
									</select><br />
								<?php } ?>
								
								<?php> if ($_SESSION['champ'] == "appartient_a") { ?>
									<label for = "old">Propriétaire</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query4->execute();
											while ($data = $query4->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom_p'] . ' ' . $data['nom_p'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<select name = "new" id = "new">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom'] . ' ' . $data['nom'] . '</option>';
											}
										?>
									</select><br />
								<?php } ?>
							
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>
					<?php } ?>

					<?php
						$query1->closeCursor();
						$query2->closeCursor();
						$query3->closeCursor();
						$query4->closeCursor();
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
