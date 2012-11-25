<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : locusIn.php -->

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
		<title>LocusIn</title>
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
						$query1 = $bdd->prepare('SELECT identifiant, type
										FROM locusType'
										);
						$query2 = $bdd->prepare('SELECT identifiant, nom
										FROM site'
										);
						$query3 = $bdd->prepare('SELECT identifiant, prenom, nom
										FROM personne'
										);
					?>
				
					<p>
						<!-- Formulaire pour un Locus. -->
						<form method = "post" action = "../exec/locusInsert.php">
							<p>
								<label for = "nom">Nom</label> : 
								<input type = "text" name = "nom" id = "nom" /><br />
								<label for = "type">Type</label> : 
								<select name = "type" id = "type">
									<?php
										$query1->execute();
										while ($data = $query1->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['type'] . '</option>';
										}
									?>
								</select> 
								<a href = "../parameters/locusType.php">Ajouter un nouveau Type de Locus ?</a><br />
								<label for = "site">Site</label> : 
								<select name = "site" id = "site">
									<?php
										$query2->execute();
										while ($data = $query2->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select> 
								<a href = "siteIn.php">Ajouter un nouveau Site ?</a><br />
								<label for = "nord">Position Nord</label> : 
								<input type = "text" name = "nord" id = "nord" /> (number)<br />
								<label for = "est">Position Est</label> : 
								<input type = "text" name = "est" id = "est" /> (number)<br />
								<label for = "altitude">Altitude</label> : 
								<input type = "text" name = "altitude" id = "altitude" /> (number)<br />
								<label for = "trouve">Trouvé par</label> : 
								<select name = "trouve" id = "trouve">
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom'] . ' ' . $data['nom'] . '</option>';
										}
									?>
								</select> 
								<a href = "personneIn.php">Ajouter une nouvelle Personne ?</a><br />
								<label for = "proprietaire">Propriétaire</label> : 
								<select name = "proprietaire" id = "proprietaire">
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom'] . ' ' . $data['nom'] . '</option>';
										}
									?>
								</select> 
								<a href = "personneIn.php">Ajouter une nouvelle Personne ?</a><br />
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
