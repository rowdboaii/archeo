<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : charbonUp.php -->

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
		<title>CharbonUp</title>
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
										AND n.nature = \'charbon\''
										);
						$query2 = $bdd->prepare('SELECT o.nom AS nom_objet, c.datation, o.objet
										FROM charbon c, objet o
										WHERE c.objet = o.identifiant'
										);
					?>

					<p>
						<!-- Formulaire sur le choix du champ à modifier. -->
						<form method = "post" action = "charbonUp.php">
							<p>
								<label for = "champ">Champ à modifier</label> : 
								<select name = "champ" id = "champ">
									<option value = "0"></option>
									<option value = "objet">objet</option>
									<option value = "datation">datation</option>
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
						<!-- Formulaire pour l'Update d'un charbon. -->
						<form method = "post" action = "../exec/charbonUpdate.php">
							<p>
								<?php if ($_SESSION['champ'] == "objet") { ?>
									<label for = "old">Objet</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query2->execute();
											while ($data = $query2->fetch()) {
												echo '<option value ="' . $data['objet'] . '">' . $data['nom_objet'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<select name = "new" id = "new">
										<option value = "0"></option>
										<?php
											$query1->execute();
											while ($data = $query1->fetch()) {
												echo '<option value ="' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
											}
										?>
									</select> 
									<a href = "../inputs/objetIn.php">Ajouter un nouvel Objet ?</a><br />
								<?php } ?>
			
								<?php if ($_SESSION['champ'] == "datation") { ?>
									<label for = "old">Datation</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query2->execute();
											while ($data = $query2->fetch()) {
												echo '<option value ="' . $data['datation'] . '">' . $data['nom_objet'] . ' : ' . $data['datation'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<input type = "date" name = "new" id = "new" /> (jj/mm/aaa)<br />
								<?php } ?>
		
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>
					<?php } ?>

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
