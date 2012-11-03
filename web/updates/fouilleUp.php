<!-- Sujet : Projet de base de donn�es pour des fouilles arch�ologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : fouilleUp.php -->

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
		<title>FouilleUp</title>
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
						$query1 = $bdd->prepare('SELECT d.identifiant, d.nom
													FROM decapage d'
													);
						$query2 = $bdd->prepare('SELECT p.nom, p.prenom, p.identifiant
													FROM personne p'
													);
						$query3 = $bdd->prepare('SELECT f.identifiant, f.nom, p.prenom, p.nom AS nom_personne, d.nom AS nom_decapage, f.annee
													FROM fouille f, personne p, decapage d
													WHERE f.fouilleur = p.identifiant
													AND f.decapage = d.identifiant'
													);
					?>

					<p>
						<!-- Formulaire pour l'Update d'une Fouille. -->
						<form method = "post" action = "../exec/fouilleUpdate.php">
							<p>
								<label for = "old_nom">Nom</label> : 
								<select name = "old_nom" id = "old_nom">
									<option value = "0"></option>
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select>
								<label for = "new_nom"> remplac� par</label> : 
								<input type = "text" name = "new_nom" id = "new_nom"><br />
								<label for = "old_decapage">D�capage</label> : 
								<select name = "old_decapage" id = "old_decapage">
									<option value = "0"></option>
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['nom_decapage'] . '</option>';
										}
									?>
								</select>
								<label for = "old_decapage">D�capage</label> : 
								<select name = "old_decapage" id = "old_decapage">
									<option value = "0"></option>
									<?php
										$query1->execute();
										while ($data = $query1->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select><br />
								<label for = "old_fouilleur">Fouilleur</label> : 
								<select name = "old_fouilleur" id = "old_fouilleur">
									<option value = "0"></option>
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom'] . ' ' . $data['nom_personne'] . '</option>';
										}
									?>
								</select>
								<label for = "new_fouilleur"> remplac� par</label> : 
								<select name = "new_fouilleur" id = "new_fouilleur">
									<option value = "0"></option>
									<?php
										$query2->execute();
										while ($data = $query2->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom'] . ' ' . $data['nom'] . '</option>';
										}
									?>
								</select><br />
								<label for = "old_annee">Ann�e</label> : 
								<select name = "old_annee" id = "old_annee">
									<option value = "0"></option>
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['annee'] . '</option>';
										}
									?>
								</select>
								<label for = "new_annee"> remplac� par</label> : 
								<input type = "date" name = "new_annee" id = "new_annee"><br />
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
