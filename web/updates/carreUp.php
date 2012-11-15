<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : carreUp.php -->

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
		<title>CarreUp</title>
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
						$query1 = $bdd->prepare('SELECT l.identifiant, l.nom
																			FROM locus l'
																			);
						$query2 = $bdd->prepare('SELECT c.identifiant, c.nom, l.nom AS nom_locus
																			FROM carre c, locus l
																			WHERE c.locus = l.identifiant'
																			);
						?>

					<p>
						<form method = "post" action = "carreUp.php">
							<p>
								<label for = "champ">Champ à modifier</label> : 
								<select name = "champ" id = "champ">
									<option value = "0"></option>
									<option value = "nom">carre</option>
									<option value = "locus">locus</option>
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
							/* Formulaire pour l'Update d'un carre. */
							<form method = "post" action = "../exec/carreUpdate.php">
								<p>
									<?php if ($champ == "nom") { ?>
										<label for = "old_nom">Nom</label> : 
										<select name = "old_nom" id = "old_nom">
											<option value = "0"></option>
											<?php
												$query2->execute();
												while ($data = $query2->fetch()) {
													echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
												}
											?>
										</select>
										<label for = "new_nom"> remplacé par</label> : 
										<input type = "text" name = "new_nom" id = "new_nom"><br />
									<?php } ?>
				
									<?php> if ($champ == "locus") { ?>
										<label for = "old_locus">Locus</label> : 
										<select name = "old_locus" id = "old_locus">
											<option value = "0"></option>
											<?php
												$query2->execute();
												while ($data = $query2->fetch()) {
													echo '<option value = "' . $data['locus'] . '">' . $data['nom_locus'] . '</option>';
												}
											?>
										</select>
										<label for = "new_locus"> remplacé par</label> : 
										<select name = "new_locus" id = "new_locus">
											<option value = "0"></option>
											<?php
												$query1->execute();
												while ($data = $query1->fetch()) {
													echo '<option value = "' . $data['locus'] . '">' . $data['nom'] . '</option>';
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
