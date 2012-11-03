<!-- Sujet : Projet de base de donn�es pour des fouilles arch�ologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : galetUp.php -->

<!-- D�marrage de la session pour les identifiants. -->
<?php session_start(); ?>

<!DOCTYPE html>
<html>

	<head>
		<!-- En-t�te de la page. -->
		<meta charset = "utf-8" />
		<link rel = "stylesheet" href = "style.css" />
		<!-- Dans le cas o� le navigateur est une version ant�rieure � IE9 -->
		<!--[if lt IE9]>
			<script src = "http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<title>GaletUp</title>
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
				<!-- Menu lat�ral sp�cifique au lien visit�. -->
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
						/* Connexion � la base de donn�es. */
						include('../includes/connexionBDD.php');

						/* R�cup�ration des donn�es pour le formulaire. */
						$query1 = $bdd->prepare('SELECT o.identifiant, o.nom
													FROM objet o, objetnature n
													WHERE o.nature = n.identifiant
													AND n.nature = \'galet\''
													);
						$query2 = $bdd->prepare('SELECT identifiant, type
													FROM galettype'
													);
						$query3 = $bdd->prepare('SELECT o.nom AS nom_objet, g.nom, t.type AS nom_type
													FROM galet g, galettype t, objet o
													WHERE g.objet = o.identifiant
													AND g.type = t.identifiant'
													);
					?>

					<p>
						<!-- Formulaire pour l'Update d'un Galet. -->
						<form method = "post" action = "../exec/galetUpdate.php">
							<p>
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
								<label for = "new_objet"> remplac� par</label> : 
								<select name = "new_objet" id = "new_objet">
									<option value = "0"></option>
									<?php
										$query1->execute();
										while ($data = $query1->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select><br />
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
								<label for = "new_nom"> remplac� par</label> : 
								<input type = "text" name = "new_nom" id = "new_nom" /><br />
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
								<label for = "new_type"> remplac� par</label> : 
								<select name = "new_type" id = "new_type">
									<option value = "0"></option>
									<?php
										$query2->execute();
										while ($data = $query2->fetch()) {
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
