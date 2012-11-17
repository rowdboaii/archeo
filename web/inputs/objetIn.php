<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : objetIn.php -->

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
		<title>ObjetIn</title>
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
					?>
				
					<p>
						<form method = "post" action = "../exec/objetInsert.php">
							<p>
								<label for = "nom">Nom</label> : <input type = "text" name = "nom" id = "nom" /><br />
								<label for = "type">Type</label> :
								<select name = "type" id = "type">
									<?php
										$query1->execute();
										while ($data = $query1->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['type'] . '</option>';
										}
									?>
								</select><br />
								<label for = "nature">nature</label> :
								<select name = "nature" id = "nature">
									<?php
										$query2->execute();
										while ($data = $query2->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nature'] . '</option>';
										}
									?>
								</select><br />
								<label for = "poids">Poids</label> : <input type = "text" name = "poids" id = "poids" /><br />
								<label for = "longueur">Longueur</label> : <input type = "text" name = "longueur" id = "longueur" /><br />
								<label for = "largeur">Largeur</label> : <input type = "text" name = "largeur" id = "largeur" /><br />
								<label for = "hauteur">Hauteur</label> : <input type = "text" name = "hauteur" id = "hauteur" /><br />
								<label for = "trouve">Trouvé par</label> :
								<select name = "trouve" id = "trouve">
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom'] . ' ' . $data['nom'] . '</option>';
										}
									?>
								</select><br />
								<label for = "collection">Collection</label> :
								<select name = "collection" id = "collection">
									<?php
										$query4->execute();
										while ($data = $query4->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select><br />
								<label for = "periode">Période</label> :
								<select name = "periode" id = "periode">
									<?php
										$query5->execute();
										while ($data = $query5->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['periode'] . '</option>';
										}
									?>
								</select><br />
								Type de Recherche : <input type = "radio" name = "recherche" value = "prospection" id = "prospection" />
										    <input type = "radio" name = "recherche" value = "fouille" id = "fouille" /><br />
								<label for = "fouille">Fouille</label> :
								<select name = "fouille" id = "fouille">
									<?php
										$query6->execute();
										while ($data = $query6->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select><br />
								<label for = "prospection">Prospection</label> :
								<select name = "prospection" id = "prospection">
									<?php
										$query7->execute();
										while ($data = $query7->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select><br />
								Tamis : <input type = "radio" name = "tamis" value = "oui" id = "oui" />
									<input type = "radio" name = "tamis" value = "non" id = "non" /><br />
								Brulé : <input type = "radio" name = "brule" value = "oui" id = "oui" />
									<input type = "radio" name = "brule" value = "non" id = "non" /><br />
								<label for = "fiche">Fiche</label> : <input type = "text" name = "fiche" id = "fiche" /><br />
								<label for = "commentaire">Commentaire</label> :<br />
								<textarea name = "commentaire" id = "commentaire" rows = "5" cols = "40"></textarea><br />
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>
					
					<?php
						$query1->closeCursor();
						$query2->closeCursor();
						$query3->closeCursor();
						$query4->closeCursor();
						$query5->closeCursor();
						$query6->closeCursor();
						$query7->closeCursor();
					?>
					
				</div>
			</section>
			<?php } ?>

			<footer>
			
				<!-- Pied de la page. -->
				<?php include('..includes/piedPage.php'); ?>
			
			</footer>

		</div>
	</body>

</html>
