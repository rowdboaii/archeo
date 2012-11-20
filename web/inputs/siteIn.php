<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : siteIn.php -->

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
		<title>SiteIn</title>
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
						$query1 = $bdd->prepare('SELECT identifiant, nom
										FROM region'
										);
						$query2 = $bdd->prepare('SELECT identifiant, prenom, nom
										FROM personne'
										);
						$query3 = $bdd->prepare('SELECT identifiant, type
										FROM sitetype'
										);
					?>
				
					<p>
						<!-- Formulaire pour un Site. -->
						<form method = "post" action = "../exec/siteInsert.php">
							<p>
								<label for = "nom">Nom</label> : <input type = "text" name = "nom" id = "nom" /><br />
								<label for = "region">Région</label> : 
								<select name = "region" id = "region">
									<?php
										$query1->execute();
										while ($data = $query1->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select> 
								<a href = "regionIn.php">Ajouter une nouvelle Région ?</a><br />
								<label for = "nord">Position Nord</label> : <input type = "text" name = "nord" id = "nord" /><br />
								<label for = "est">Position Est</label> : <input type = "text" name = "est" id = "est" /><br />
								<label for = "altitude">Altitude</label> : <input type = "text" name = "altitude" id = "altitude" /><br />
								<label for = "trouve">Trouvé par</label> : 
								<select name = "trouve" id = "trouve">
									<?php
										$query2->execute();
										while ($data = $query2->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom'] . ' ' . $data['nom'] . '</option>';
										}
									?>
								</select> 
								<a href = "personneIn.php">Ajouter une nouvelle Personne ?</a><br />
								<label for = "fouille">Fouillé par</label> : 
								<select name = "fouille" id = "fouille">
									<?php
										$query2->execute();
										while ($data = $query2->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom'] . ' ' . $data['nom'] . '</option>';
										}
									?>
								</select> 
								<a href = "personneIn.php">Ajouter une nouvelle Personne ?</a><br />
								<label for = "type">Type</label> : 
								<select name = "type" id = "type">
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['type'] . '</option>';
										}
									?>
								</select> 
								<a href = "../parameters/siteType.php">Ajouter un nouveau Type de Site ?</a><br />
								<label for = "commentaire">Commentaire</label> :<br />								
								<input type = "text" name = "commentaire" id = "commentaire" width = "30px" height = "5px" /><br />
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
