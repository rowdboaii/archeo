<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : objetUp.php -->

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
		<title>ObjetUp</title>
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
										FROM objetType'
										);
						$query2 = $bdd->prepare('SELECT identifiant, nature
										FROM objetNature'
										);
						$query3 = $bdd->prepare('SELECT identifiant, prenom, nom
										FROM personne'
										);
						$query4 = $bdd->prepare('SELECT identifiant, nom
										FROM collection'
										);
						$query5 = $bdd->prepare('SELECT identifiant, periode
										FROM periode'
										);
						$query6 = $bdd->prepare('SELECT identifiant, nom
										FROM fouille'
										);
						$query7 = $bdd->prepare('SELECT identifiant, nom
										FROM prospection'
										);
						$query8 = $bdd->prepare('SELECT o.identifiant, o.nom, t.type AS nom_type, o.poids, o.longueur, o.largeur, o.hauteur, n.nature AS nom_nature, o.fiche, o.brule, p.periode AS nom_periode,
										f.prenom AS prenom_f, f.nom AS nom_f, c.nom AS nom_collection, o.tamis, r.nom AS nom_prospection, u.nom AS nom_fouille, o.commentaire
										FROM objet o, objettype t, objetnature n, periode p, personne f, collection c, prospection r, fouille u
										WHERE o.type = t.identifiant
										AND o.nature = n.identifiant
										AND o.periode = p.identifiant
										AND o.trouve_par = f.identifiant
										AND o.collection = c.identifiant
										AND o.prospection = r.identifiant
										AND o.fouille = u.identifiant'
										);
					?>

					<p>
						<!-- Formulaire sur le choix du champ à modifier. -->
						<form method = "post" action = "objetUp.php">
							<p>
								<label for = "champ">Champ à modifier</label> : 
								<select name = "champ" id = "champ">
									<option value = "0"></option>
									<option value = "nom">nom</option>
									<option value = "type">type</option>
									<option value = "poids">poids</option>
									<option value = "longueur">longueur</option>
									<option value = "largeur">largeur</option>
									<option value = "hauteur">hauteur</option>
									<option value = "nature">nature</option>
									<option value = "periode">période</option>
									<option value = "trouve_par">trouvé par</option>
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
						<!-- Formulaire pour l'Update d'un Objet. -->
						<form method = "post" action = "../exec/objetUpdate.php">
							<p>
								<?php if ($champ == "nom") { ?>
									<label for = "old_nom">Nom</label> : 
									<select name = "old_nom" id = "old_nom">
										<option value = "0"></option>
										<?php
											$query8->execute();
											while ($data = $query8->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
											}
										?>
									</select>
									<label for = "new_nom"> remplacé par</label> : 
									<input type = "text" name = "new_nom" id = "new_nom" /><br />
								<?php } ?>
								
								<?php> if ($champ == "type") { ?>
									<label for = "old_type">Type</label> :
									<select name = "old_type" id = "old_type">
										<option value = "0"></option>
										<?php
											$query8->execute();
											while ($data = $query8->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['nom_type'] . '</option>';
											}
										?>
									</select>
									<label for = "new_type"> remplacé par</label> : 
									<select name = "new_type" id = "new_type">
										<option value = "0"></option>
										<?php
											$query1->execute();
											while ($data = $query1->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['type'] . '</option>';
											}
										?>
									</select><br />
								<?php } ?>
								
								<?php> if ($champ == "poids") { ?>
									<label for = "old_poids">Poids</label> : 
									<select name = "old_poids" id = "old_poids">
										<option value = "0"></option>
										<?php
											$query8->execute();
											while ($data = $query8->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['poids'] . '</option>';
											}
										?>
									</select>
									<label for = "new_poids"> remplacé par</label> : 
									<input type = "text" name = "new_poids" id = "new_poids" /><br />
								<?php } ?>
								
								<?php> if ($champ == "nature") { ?>
									<label for = "old_nature">nature</label> :
									<select name = "old_nature" id = "old_nature">
										<option value = "0"></option>
										<?php
											$query8->execute();
											while ($data = $query8->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['nom_nature'] . '</option>';
											}
										?>
									</select>
									<label for = "new_nature"> remplacé par</label> : 
									<select name = "new_nature" id = "new_nature">
										<option value = "0"></option>
										<?php
											$query2->execute();
											while ($data = $query2->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['nature'] . '</option>';
											}
										?>
									</select><br />
								<?php } ?>
								
								<?php> if ($champ == "longueur") { ?>
									<label for = "old_longueur">Longueur</label> : 
									<select name = "old_longueur" id = "old_longueur">
										<option value = "0"></option>
										<?php
											$query8->execute();
											while ($data = $query8->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['longueur'] . '</option>';
											}
										?>
									</select>
									<label for = "new_longueur"> remplacé par</label> : 
									<input type = "text" name = "new_longueur" id = "new_longueur" /><br />
								<?php } ?>
								
								<?php> if ($champ == "largeur") { ?>
									<label for = "old_largeur">Largeur</label> : 
									<select name = "old_largeur" id = "old_largeur">
										<option value = "0"></option>
										<?php
											$query8->execute();
											while ($data = $query8->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['largeur'] . '</option>';
											}
										?>
									</select>
									<label for = "new_largeur"> remplacé par</label> : 
									<input type = "text" name = "new_largeur" id = "new_largeur" /><br />
								<?php } ?>
								
								<?php> if ($champ == "hauteur") { ?>
									<label for = "old_hauteur">Hauteur</label> : 
									<select name = "old_hauteur" id = "old_hauteur">
										<option value = "0"></option>
										<?php
											$query8->execute();
											while ($data = $query8->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['hauteur'] . '</option>';
											}
										?>
									</select>
									<label for = "new_hauteur"> remplacé par</label> : 
									<input type = "text" name = "new_hauteur" id = "new_hauteur" /><br />
								<?php } ?>
								
								<?php> if ($champ == "periode") { ?>
									<label for = "old_periode">Période</label> : 
									<select name = "old_periode" id = "old_periode">
										<option value = "0"></option>
										<?php
											$query8->execute();
											while ($data = $query8->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['nom_periode'] . '</option>';
											}
										?>
									</select>
									<label for = "new_periode"> remplacé par</label> : 
									<select name = "new_periode" id = "new_periode">
										<option value = "0"></option>
										<?php
											$query5->execute();
											while ($data = $query5->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['periode'] . '</option>';
											}
										?>
									</select><br />
								<?php } ?>
								
								<?php> if ($champ == "trouve_par") { ?>
									<label for = "old_trouve">Trouvé par</label> : 
									<select name = "old_trouve" id = "old_trouve">
										<option value = "0"></option>
										<?php
											$query8->execute();
											while ($data = $query8->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom_f'] . ' ' . $data['nom_f'] . '</option>';
											}
										?>
									</select> 
									<label for = "new_trouve"> remplacé par</label> : 
									<select name = "new_trouve" id = "new_trouve">
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
						$query5->closeCursor();
						$query6->closeCursor();
						$query7->closeCursor();
						$query8->closeCursor();
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
