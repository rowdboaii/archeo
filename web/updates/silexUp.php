﻿<!-- Sujet : Projet de base de données pour des fouilles archéogiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : silexUp.php -->

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
		<title>SilexUp</title>
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
						$query1 = $bdd->prepare('SELECT o.identifiant, o.nom
										FROM objet o, objetnature n
										WHERE o.nature = n.identifiant
										AND n.nature = \'silex\''
										);
						$query2 = $bdd->prepare('SELECT identifiant, nom
										FROM gisement'
										);
						$query3 = $bdd->prepare('SELECT o.nom AS nom_objet, g.nom AS nom_gisement, s.couleur
										FROM silex s, gisement g, objet o
										WHERE s.provenance = g.identifiant
										AND s.objet = o.identifiant'
										);
					?>

					<p>
						<!-- Formulaire sur le choix du champ à modifier. -->
						<form method = "post" action = "silexUp.php">
							<p>
								<label for = "champ">Champ à modifier</label> : 
								<select name = "champ" id = "champ">
									<option value = "0"></option>
									<option value = "objet">objet</option>
									<option value = "provenance">provenance</option>
									<option value = "couleur">couleur</option>
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
						<!-- Formulaire pour l'Update d'un Silex. -->
						<form method = "post" action = "../exec/silexUpdate.php">
							<p>
								<?php if ($champ == "objet") { ?>
									<label for = "old_objet">Objet</label> : 
									<select name = "old_objet" id = "old_objet">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['nom_objet'] . '</option>';
											}
										?>
									</select>
									<label for = "new_objet"> remplacé par</label> : 
									<select name = "new_objet" id = "new_objet">
										<option value = "0"></option>
										<?php
											$query1->execute();
											while ($data = $query1->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
											}
										?>
									</select><br />
								<?php } ?>
								
								<?php if ($champ == "provenance") { ?>
									<label for = "old_provenance">Provenance</label> : 
									<select name = "old_provenance" id = "old_provenance">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['nom_gisement'] . '</option>';
											}
										?>
									</select>
									<label for = "new_provenance"> remplacé par</label> : 
									<select name = "new_provenance" id = "new_provenance">
										<option value = "0"></option>
										<?php
											$query2->execute();
											while ($data = $query2->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
											}
										?>
									</select><br />
								<?php } ?>
								
								<?php if ($champ == "couleur") { ?>
									<label for = "old_couleur">Couleur</label> : 
									<select name = "old_couleur" id = "old_couleur">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['couleur'] . '</option>';
											}
										?>
									</select>
									<label for = "new_couleur"> remplacé par</label> : 
									<input type = "text" name = "new_couleur" id = "new_couleur" /><br />
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