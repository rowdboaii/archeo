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
		<link rel = "stylesheet" href = "style.css" />
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
						$query4 = $bdd->prepare('SELECT s.identifiant, s.nom, r.nom AS nom_region, t.type AS nom_type, s.position_nord, s.position_est, s.altitude, p.prenom AS prenom_p, p.nom AS nom_p, f.prenom AS prenom_f, f.nom AS nom_f, s.commentaire
													FROM site s, region r, sitetype t, personne p, personne f
													WHERE s.region = r.identifiant
													AND s.type = t.identifiant
													AND s.trouve_par = p.identifiant
													AND s.fouille_par = f.identifiant'
													);
					?>

					<p>
						<!-- Formulaire pour l'Update d'un Site. -->
						<form method = "post" action = "../exec/siteUpdate.php">
							<p>
								<label for = "old_nom">Nom</label> : 
								<select name = "old_nom" id = "old_nom">
									<option value = "0"></option>
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
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
										$query3->execute();
										while ($data = $query3->fetch()) {
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
								<label for = "old_nord">Position Nord</label> : 
								<select name = "old_nord" id = "old_nord">
									<option value = "0"></option>
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['position_nord'] . '</option>';
										}
									?>
								</select>
								<label for = "new_nord"> remplacé par</label> : 
								<input type = "text" name = "new_nord" id = "new_nord" /><br />
								<label for = "old_est">Position Est</label> : 
								<select name = "old_est" id = "old_est">
									<option value = "0"></option>
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['position_est'] . '</option>';
										}
									?>
								</select>
								<label for = "new_est"> remplacé par</label> : 
								<input type = "text" name = "new_est" id = "new_est" /><br />
								<label for = "old_altitude">Altitude</label> : 
								<select name = "old_altitude" id = "old_altitude">
									<option value = "0"></option>
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['altitude'] . '</option>';
										}
									?>
								</select>
								<label for = "new_altitude"> remplacé par</label> : 
								<input type = "text" name = "new_altitude" id = "new_altitude" /><br />
								<label for = "old_trouve">Trouvé par</label> : 
								<select name = "old_trouve" id = "old_trouve">
									<option value = "0"></option>
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom_p'] . ' ' . $data['nom_p'] . '</option>';
										}
									?>
								</select>
								<label for = "new_trouve"> remplacé par</label> : 
								<select name = "new_trouve" id = "new_trouve">
									<option value = "0"></option>
									<?php
										$query2->execute();
										while ($data = $query2->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom'] . ' ' . $data['nom'] . '</option>';
										}
									?>
								</select><br />
								<label for = "old_fouille">Fouillé par</label> : 
								<select name = "old_fouille" id = "old_fouille">
									<option value = "0"></option>
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom_f'] . ' ' . $data['nom_f'] . '</option>';
										}
									?>
								</select>
								<label for = "new_fouille"> remplacé par</label> : 
								<select name = "new_fouille" id = "new_fouille">
									<option value = "0"></option>
									<?php
										$query2->execute();
										while ($data = $query2->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom'] . ' ' . $data['nom'] . '</option>';
										}
									?>
								</select><br />
								<label for = "old_type">Type</label> : 
								<select name = "old_type" id = "old_type">
									<option value = "0"></option>
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom_type'] . '</option>';
										}
									?>
								</select>
								<label for = "new_type"> remplacé par</label> : 
								<select name = "new_type" id = "new_type">
									<option value = "0"></option>
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['type'] . '</option>';
										}
									?>
								</select><br />
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>
					
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