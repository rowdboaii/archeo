<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : osIn.php -->

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
		<title>OsIn</title>
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
	
					<!-- Menu pour les inputs. -->
					<?php include('../includes/menuIn.php'); ?>
					
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
					?>
				
					<p>
						<!-- Formulaire pour un Os. -->
						<form method = "post" action = "../exec/osInsert.php">
							<p>
								<label for = "objet">Objet</label> : 
								<select name = "objet" id = "objet">
									<?php
										$query1->execute();
										while ($data = $query1->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select> 
								<a href = "objetIn.php">Ajouter un nouvel Objet ?</a><br />
								<label for = "partie">Partie Animal</label> : <input type = "text" name = "partie" id = "partie" /><br />
								<label for = "type">Type Os</label> : <input type = "text" name = "type" id = "type" /><br />
								<label for = "taxon">Taxon</label> : 
								<select name = "taxon" id = "taxon">
									<?php
										$query2->execute();
										while ($data = $query2->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['taxon'] . '</option>';
										}
									?>
								</select> 
								<a href = "../parameters/osTaxon.php">Ajouter un nouveau Taxon d'Os ?</a><br />
								<label for = "animal">Animal</label> : <input type = "text" name = "animal" id = "animal" /><br />
								<label for = "type_animal">Type d'Animal</label> : <input type = "text" name = "type_animal" id = "type_animal" /><br />
								<label for = "forme">Forme</label> : <input type = "text" name = "forme" id = "forme" /><br />
								Dissolution : <input type = "radio" name = "dissolution" value = "oui" id = "oui" /><br />
								Morsure : <input type = "radio" name = "morsure" value = "oui" id = "oui" /><br />
								<label for = "conservation">Conservation</label> : 
								<select name = "conservation" id = "conservation">
									<option value = "0">0</option>
									<option value = "1">1</option>
									<option value = "2">2</option>
									<option value = "3">3</option>
									<option value = "4">4</option>
									<option value = "5">5</option>
									<option value = "6">6</option>
									<option value = "7">7</option>
									<option value = "8">8</option>
									<option value = "9">9</option>
									<option value = "10">10</option>
								</select><br />
								<label for = "date">Datation</label> : <input type = "text" name = "date" id = "date" /><br />
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>
					
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
