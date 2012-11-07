<!-- Sujet : Projet de base de données pour des fouilles archéogiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : personneUp.php -->

<!-- Démarrage de la session pour les identifiants. -->
<?php session_start(); ?>

<!DOCTYPE html>
<html>

	<head>
		<!-- En-tête de la page. -->
		<meta charset = "utf-8" />
		<link rel = "stylesheet" href = "style.css" />
		<!-- Dans le cas où le navigateur est une version antéeure à IE9 -->
		<!--[if lt IE9]>
			<script src = "http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<title>PersonneUp</title>
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
				<!-- Menu latéral spéfique au lien visité. -->
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
						/* Connexion àa base de données. */
						include('../includes/connexionBDD.php');

						/* Récupération des données pour le formulaire. */
						$query1 = $bdd->prepare('SELECT identifiant, nationalite
													FROM nationalite'
													);
						$query2 = $bdd->prepare('SELECT identifiant, fonction
													FROM fonction'
													);
						$query3 = $bdd->prepare('SELECT p.identifiant, p.prenom, p.nom, n.nationalite, f.fonction
													FROM personne p, nationalite n, fonction f
													WHERE p.nationalite = n.identifiant
													AND p.fonction = f.identifiant'
													);
					?>

					<p>
						<!-- Formulaire pour l'Update d'une Personne. -->
						<form method = "post" action = "../exec/personneUpdate.php">
							<p>
								<label for = "old_nom">Nom</label> : 
								<select name = "old_nom" id = "old_nom">
									<option value = "0"></option>4
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select>
								<label for = "new_nom"> remplacé par</label> :
								<input type = "text" name = "new_nom" id = "new_nom" /><br />
								<label for = "old_prenom">Prénom</label> : 
								<select name = "old_prenom" id = "old_prenom">
									<option value = "0"></option>4
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['prenom'] . '</option>';
										}
									?>
								</select>
								<label for = "new_prenom"> remplacé par</label> : 
								<input type = "text" name = "new_prenom" id = "new_prenom" /><br />
								<label for = "old_nationalite">Nationalité</label> : 
								<select name = "old_nationalite" id = "old_nationalite">
									<option value = "0"></option>4
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['nationalite'] . '</option>';
										}
									?>
								</select>
								<label for = "new_nationalite"> remplacé par</label> : 
								<select name = "new_nationalite" id = "new_nationalite">
									<option value = "0"></option>4
									<?php
										$query1->execute();
										while ($data = $query1->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['nationalite'] . '</option>';
										}
									?>
								</select><br />
								<label for = "old_fonction">Fonction</label> : 
								<select name = "old_fonction" id = "old_fonction">
									<option value = "0"></option>4
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['fonction'] . '</option>';
										}
									?>
								</select>
								<label for = "new_fonction"> remplacé par</label> : 
								<select name = "new_fonction" id = "new_fonction">
									<option value = "0"></option>4
									<?php
										$query2->execute();
										while ($data = $query2->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['fonction'] . '</option>';
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