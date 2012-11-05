<!-- Sujet : Projet de base de donn�es pour des fouilles arch�ologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : objetUp.php -->

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
		<title>ObjetUp</title>
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
						$query8 = $bdd->prepare('SELECT o.identifiant, o.nom, t.type AS nom_type, o.poids, o.longueur, o.largeur, o.hauteur, n.nature AS nom_nature, o.fiche, o.brule, p.periode AS nom_periode, f.prenom AS prenom_f, f.nom AS nom_f, c.nom AS nom_collection, o.tamis, r.nom AS nom_prospection, u.nom AS nom_fouille, o.commentaire
													FROM objet o, objettype t, objetnature n, periode p, personne f, collection c, prospection r, fouille u
													WHERE o.type = t.identifiant
													AND o.nature = n.identifiant
													AND o.periode = p.identifiant
													AND o.trouve_par = f.identifiant
													AND o.collection = c.identifiant
													AND o.prospection = r.identifiant
													AND o.fouille = u.identifiant'
													);
					?>

					<p>
						<!-- Formulaire pour l'Update d'un Objet. -->
						<form method = "post" action = "../exec/objetUpdate.php">
							<p>
								<label for = "old_nom">Nom</label> : 
								<select name = "old_nom" id = "old_nom">
									<option value = "0"></option>
									<?php
										$query8->execute();
										while ($data = $query8->fetch()) {
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
										$query8->execute();
										while ($data = $query8->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom_type'] . '</option>';
										}
									?>
								</select>
								<label for = "new_type"> remplac� par</label> : 
								<select name = "new_type" id = "new_type">
									<option value = "0"></option>
									<?php
										$query1->execute();
										while ($data = $query1->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['type'] . '</option>';
										}
									?>
								</select><br />
								<label for = "old_nature">nature</label> :
								<select name = "old_nature" id = "old_nature">
									<option value = "0"></option>
									<?php
										$query8->execute();
										while ($data = $query8->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom_nature'] . '</option>';
										}
									?>
								</select>
								<label for = "new_nature"> remplac� par</label> : 
								<select name = "new_nature" id = "new_nature">
									<option value = "0"></option>
									<?php
										$query2->execute();
										while ($data = $query2->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nature'] . '</option>';
										}
									?>
								</select><br />
								<label for = "old_poids">Poids</label> : 
								<select name = "old_poids" id = "old_poids">
									<option value = "0"></option>
									<?php
										$query8->execute();
										while ($data = $query8->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['poids'] . '</option>';
										}
									?>
								</select>
								<label for = "new_poids"> remplac� par</label> : 
								<input type = "text" name = "new_poids" id = "new_poids" /><br />
								<label for = "old_longueur">Longueur</label> : 
								<select name = "old_longueur" id = "old_longueur">
									<option value = "0"></option>
									<?php
										$query8->execute();
										while ($data = $query8->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['longueur'] . '</option>';
										}
									?>
								</select>
								<label for = "new_longueur"> remplac� par</label> : 
								<input type = "text" name = "new_longueur" id = "new_longueur" /><br />
								<label for = "old_largeur">Largeur</label> : 
								<select name = "old_largeur" id = "old_largeur">
									<option value = "0"></option>
									<?php
										$query8->execute();
										while ($data = $query8->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['largeur'] . '</option>';
										}
									?>
								</select>
								<label for = "new_largeur"> remplac� par</label> : 
								<input type = "text" name = "new_largeur" id = "new_largeur" /><br />
								<label for = "old_hauteur">Hauteur</label> : 
								<select name = "old_hauteur" id = "old_hauteur">
									<option value = "0"></option>
									<?php
										$query8->execute();
										while ($data = $query8->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['hauteur'] . '</option>';
										}
									?>
								</select>
								<label for = "new_hauteur"> remplac� par</label> : 
								<input type = "text" name = "new_hauteur" id = "new_hauteur" /><br />
								<label for = "old_trouve">Trouv� par</label> : 
								<select name = "old_trouve" id = "old_trouve">
									<option value = "0"></option>
									<?php
										$query8->execute();
										while ($data = $query8->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom_f'] . ' ' . $data['nom_f'] . '</option>';
										}
									?>
								</select> 
								<label for = "new_trouve"> remplac� par</label> : 
								<select name = "new_trouve" id = "new_trouve">
									<option value = "0"></option>
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom'] . ' ' . $data['nom'] . '</option>';
										}
									?>
								</select><br />
								<label for = "old_collection">Collection</label> :
								<select name = "old_collection" id = "old_collection">
									<option value = "0"></option>
									<?php
										$query8->execute();
										while ($data = $query8->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom_collection'] . '</option>';
										}
									?>
								</select>
								<label for = "new_collection"> remplac� par</label> : 
								<select name = "new_collection" id = "new_collection">
									<option value = "0"></option>
									<?php
										$query4->execute();
										while ($data = $query4->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select><br />
								<label for = "old_periode">P�riode</label> : 
								<select name = "old_periode" id = "old_periode">
									<option value = "0"></option>
									<?php
										$query8->execute();
										while ($data = $query8->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom_periode'] . '</option>';
										}
									?>
								</select>
								<label for = "new_periode"> remplac� par</label> : 
								<select name = "new_periode" id = "new_periode">
									<option value = "0"></option>
									<?php
										$query5->execute();
										while ($data = $query5->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['periode'] . '</option>';
										}
									?>
								</select><br />								
								<label for = "old_fouille">Fouille</label> : 
								<select name = "old_fouille" id = "old_fouille">
									<option value = "0"></option>
									<?php
										$query8->execute();
										while ($data = $query8->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom_fouille'] . '</option>';
										}
									?>
								</select>
								<label for = "new_fouille"> remplac� par</label> : 
								<select name = "new_fouille" id = "new_fouille">
									<option value = "0"></option>
									<?php
										$query6->execute();
										while ($data = $query6->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select><br />
								<label for = "old_prospection">Prospection</label> : 
								<select name = "old_prospection" id = "old_prospection">
									<option value = "0"></option>
									<?php
										$query8->execute();
										while ($data = $query8->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom_prospection'] . '</option>';
										}
									?>
								</select>
								<label for = "new_prospection"> remplac� par</label> : 
								<select name = "new_prospection" id = "new_prospection">
									<option value = "0"></option>
									<?php
										$query7->execute();
										while ($data = $query7->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select><br />
								<label for = "old_fiche">Fiche</label> : 
								<select name = "old_fiche" id = "old_fiche">
									<option value = "0"></option>
									<?php
										$query8->execute();
										while ($data = $query8->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['fiche'] . '</option>';
										}
									?>
								</select>
								<label for = "new_fiche"> remplac� par</label> : 
								<input type = "text" name = "new_fiche" id = "new_fiche" /><br />
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
						$query8->closeCursor();
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
