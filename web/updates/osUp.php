<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : OsUp.php -->

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
		<title>OsUp</title>
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
						$query1 = $bdd->prepare('SELECT o.identifiant, o.nom
													FROM objet o, objetnature n
													WHERE o.nature = n.identifiant
													AND n.nature = \'os\''
													);
						$query2 = $bdd->prepare('SELECT identifiant, taxon
													FROM osTaxon'
													);
						$query3 = $bdd->prepare('SELECT o.nom AS nom_objet, s.partie, s.type, t.taxon AS nom_taxon, s.animal, s.type_animal, s.forme, s.dissous, s.morsure, s.conservation, s.datation
													FROM os s, objet o, ostaxon t
													WHERE s.objet = o.identifiant
													AND s.taxon = t.identifiant'
													);
					?>

					<p>
						<!-- Formulaire pour l'Update d'un Os. -->
						<form method = "post" action = "../exec/osUpdate.php">
							<p>
								<label for = "old_objet">Objet</label> : 
								<select name = "old_objet" id = "old_objet">
									<option value = "0"></option>
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['nom_objet'] . '</option>';
										}
									?>
								</select>
								<label for = "new_objet"> remplacé par</label> : 
								<select name = "new_objet" id = "new_objet">
									<option value = "0"></option>
									<?php
										$query1->execute();
										while ($data = $query1->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select><br />
								<label for = "old_partie">Partie Animal</label> : 
								<select name = "old_partie" id = "old_partie">
									<option value = "0"></option>
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['partie'] . '</option>';
										}
									?>
								</select>
								<label for = "new_partie"> remplacé par</label> : 
								<input type = "text" name = "new_partie" id = "new_partie" /><br />
								<label for = "old_type">Type Os</label> : 
								<select name = "old_type" id = "old_type">
									<option value = "0"></option>
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['type'] . '</option>';
										}
									?>
								</select>
								<label for = "new_type"> remplacé par</label> : 
								<input type = "text" name = "new_type" id = "new_type" /><br />
								<label for = "old_taxon">Taxon</label> : 
								<select name = "old_taxon" id = "old_taxon">
									<option value = "0"></option>
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['nom_taxon'] . '</option>';
										}
									?>
								</select>
								<label for = "new_taxon"> remplacé par</label> : 
								<select name = "new_taxon" id = "new_taxon">
									<option value = "0"></option>
									<?php
										$query2->execute();
										while ($data = $query2->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['taxon'] . '</option>';
										}
									?>
								</select><br />
								<label for = "old_animal">Animal</label> : 
								<select name = "old_animal" id = "old_animal">
									<option value = "0"></option>
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['animal'] . '</option>';
										}
									?>
								</select>
								<label for = "new_animal"> remplacé par</label> : 
								<input type = "text" name = "new_animal" id = "new_animal" /><br />
								<label for = "old_type_animal">Type d'Animal</label> : 
								<select name = "old_type_animal" id = "old_type_animal">
									<option value = "0"></option>
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['type_animal'] . '</option>';
										}
									?>
								</select>
								<label for = "new_type_animal"> remplacé par</label> : 
								<input type = "text" name = "new_type_animal" id = "new_type_animal" /><br />
								<label for = "old_forme">Forme</label> : 
								<select name = "old_forme" id = "old_forme">
									<option value = "0"></option>
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['forme'] . '</option>';
										}
									?>
								</select>
								<label for = "new_forme"> remplacé par</label> : 
								<input type = "text" name = "new_forme" id = "new_forme" /><br />
								<label for = "old_date">Datation</label> : 
								<select name = "old_date" id = "old_date">
									<option value = "0"></option>
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['datation'] . '</option>';
										}
									?>
								</select>
								<input type = "text" name = "new_date" id = "new_date" /><br />
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