<!-- Sujet : Projet de base de données pour des fouilles archéogiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : siteUp.php -->

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
		<title>SiteUp</title>
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
						/* Connexion à base de données. */
						include('../includes/connexionBDD.php');

						/* Répération des données pour le formulaire. */
						$query1 = $bdd->prepare('SELECT identifiant, nom
													FROM region'
													);
						$query2 = $bdd->prepare('SELECT identifiant, prenom, nom
													FROM personne'
													);
						$query3 = $bdd->prepare('SELECT identifiant, type
													FROM sitetype'
													);
						$query4 = $bdd->prepare('SELECT s.identifiant, s.nom, r.nom AS nom_region, t.type AS nom_type, s.position_nord, s.position_est, s.altitude, s.trouve_par, s.fouille_par,
													p.prenom AS prenom_p, p.nom AS nom_p, f.prenom AS prenom_f, f.nom AS nom_f, s.commentaire, s.region, s.type
													FROM site s, region r, sitetype t, personne p, personne f
													WHERE s.region = r.identifiant
													AND s.type = t.identifiant
													AND s.trouve_par = p.identifiant
													AND s.fouille_par = f.identifiant'
													);
					?>

					<p>
						<!-- Formulaire sur le choix du champ à modifier. -->
						<form method = "post" action = "siteUp.php">
							<p>
								<label for = "champ">Champ à modifier</label> : 
								<select name = "champ" id = "champ">
									<option value = "0"></option>
									<option value = "nom">nom</option>
									<option value = "region">région</option>
									<option value = "type">type</option>
									<option value = "position_nord">position nord</option>
									<option value = "position_est">position est</option>
									<option value = "altitude">altitude</option>
									<option value = "trouve_par">trouvé par</option>
									<option value = "fouille_par">fouille par</option>
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
						<!-- Formulaire pour l'Update d'un Site. -->
						<form method = "post" action = "../exec/siteUpdate.php">
							<p>
								<?php if ($_SESSION['champ'] == "nom") { ?>
									<label for = "old">Nom</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value = "' . $data['nom'] . '">' . $data['nom'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<input type = "text" name = "new" id = "new" /><br />
								<?php } ?>
								
								<?php if ($_SESSION['champ'] == "region") { ?>
									<label for = "old">Région</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value = "' . $data['region'] . '">' . $data['nom_region'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<select name = "new" id = "new">
										<option value = "0"></option>
										<?php
											$query1->execute();
											while ($data = $query1->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
											}
										?>
									</select> 
									<a href = "../inputs/regionIn.php">Ajouter une nouvelle Région ?</a><br />
								<?php } ?>
								
								<?php if ($_SESSION['champ'] == "type") { ?>
									<label for = "old">Type</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value = "' . $data['type'] . '">' . $data['nom_type'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<select name = "new" id = "new">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['type'] . '</option>';
											}
										?>
									</select> 
									<a href = "../parameters/siteType.php">Ajouter un nouveau Type de Site ?</a><br />
								<?php } ?>
								
								<?php if ($_SESSION['champ'] == "position_nord") { ?>
									<label for = "old">Position Nord</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value = "' . $data['position_nord'] . '">' . $data['position_nord'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<input type = "text" name = "new" id = "new" /><br />
								<?php } ?>
								
								<?php if ($_SESSION['champ'] == "position_est") { ?>
									<label for = "old">Position Est</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value = "' . $data['position_est'] . '">' . $data['position_est'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<input type = "text" name = "new" id = "new" /><br />
								<?php } ?>
								
								<?php if ($_SESSION['champ'] == "altitude") { ?>
									<label for = "old">Altitude</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value = "' . $data['altitude'] . '">' . $data['altitude'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<input type = "text" name = "new" id = "new" /><br />
								<?php } ?>
								
								<?php if ($_SESSION['champ'] == "trouve_par") { ?>
									<label for = "old">Trouvé par</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value = "' . $data['trouve_par'] . '">' . $data['prenom_p'] . ' ' . $data['nom_p'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<select name = "new" id = "new">
										<option value = "0"></option>
										<?php
											$query2->execute();
											while ($data = $query2->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom'] . ' ' . $data['nom'] . '</option>';
											}
										?>
									</select> 
									<a href = "../inputs/personneIn.php">Ajouter une nouvelle Personne ?</a><br />
								<?php } ?>
								
								<?php if ($_SESSION['champ'] == "fouille_par") { ?>
									<label for = "old">Fouillé par</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value = "' . $data['fouille_par'] . '">' . $data['prenom_f'] . ' ' . $data['nom_f'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<select name = "new" id = "new">
										<option value = "0"></option>
										<?php
											$query2->execute();
											while ($data = $query2->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom'] . ' ' . $data['nom'] . '</option>';
											}
										?>
									</select> 
									<a href = "../inputs/personneIn.php">Ajouter une nouvelle Personne ?</a><br />
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
