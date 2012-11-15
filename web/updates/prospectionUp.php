<!-- Sujet : Projet de base de données pour des fouilles archéogiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : prospectionUp.php -->

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
		<title>ProspectionUp</title>
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
										FROM lieu'
										);
						$query2 = $bdd->prepare('SELECT identifiant, prenom, nom
										FROM personne'
										);
						$query3 = $bdd->prepare('SELECT p.identifiant, p.nom, l.nom AS nom_lieu, r.prenom AS prenom_r, r.nom AS nom_r, p.date_prospection
										FROM prospection p, personne r, lieu l
										WHERE p.responsable = r.identifiant
										AND p.lieu = l.identifiant'
										);
					?>

					<p>
						<!-- Formulaire sur le choix du champ à modifier. -->
						<form method = "post" action = "prospectionUp.php">
							<p>
								<label for = "champ">Champ à modifier</label> : 
								<select name = "champ" id = "champ">
									<option value = "0"></option>
									<option value = "nom">nom</option>
									<option value = "lieu">lieu</option>
									<option value = "responsable">responsable</option>
									<option value = "date_prospection">date</option>
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
						<!-- Formulaire pour l'Update d'une Prospection. -->
						<form method = "post" action = "../exec/prospectionUpdate.php">
							<p>
								<?php if ($champ == "nom") { ?>
									<label for = "old_nom">Nom</label> : 
									<select name = "old_nom" id = "old_nom">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value ="' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
											}
										?>
									</select>
									<label for = "new_nom"> remplacé par</label> : 
									<input type = "text" name = "new_nom" id = "new_nom" /><br />
								<?php } ?>
								
								<?php if ($champ == "lieu") { ?>
									<label for = "old_lieu">Lieu</label> : 
									<select name = "old_lieu" id = "old_lieu">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value ="' . $data['identifiant'] . '">' . $data['nom_lieu'] . '</option>';
											}
										?>
									</select>
									<label for = "new_lieu"> remplacé par</label> : 
									<select name = "new_lieu" id = "new_lieu">
										<option value = "0"></option>
										<?php
											$query1->execute();
											while ($data = $query1->fetch()) {
												echo '<option value ="' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
											}
										?>
									</select><br />
								<?php } ?>
								
								<?php if ($champ == "responsable") { ?>
									<label for = "old_responsable">Responsable</label> : 
									<select name = "old_responsable" id = "old_responsable">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value ="' . $data['identifiant'] . '">' . $data['prenom'] . ' ' . $data['nom'] . '</option>';
											}
										?>
									</select>
									<label for = "new_responsable"> remplacé par</label> : 
									<select name = "new_responsable" id = "new_responsable">
										<option value = "0"></option>
										<?php
											$query2->execute();
											while ($data = $query2->fetch()) {
												echo '<option value ="' . $data['identifiant'] . '">' . $data['prenom'] . ' ' . $data['nom'] . '</option>';
											}
										?>
									</select><br />
								<?php } ?>
								
								<?php if ($champ == "date_prospection") { ?>
									<label for = "old_date">Date Prospection</label> : 
									<select name = "old_date" id = "old_date">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value ="' . $data['identifiant'] . '">' . $data['date_prospection'] . '</option>';
											}
										?>
									</select>
									<label for = "new_date"> remplacé par</label> : 
									<input type = "text" name = "new_date" id = "new_date" /><br />
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