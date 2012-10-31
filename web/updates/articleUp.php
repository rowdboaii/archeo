<!-- Sujet : Projet de base de donn�es pour des fouilles arch�ologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : articleUp.php -->

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
		<title>ArticleUp</title>
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
						$query1 = $bdd->prepare('SELECT identifiant, prenom, nom
																			FROM personne'
																			);
						$query2 = $bdd->prepare('SELECT identifiant, nom
																			FROM locus'
																			);
						$query3 = $bdd->prepare('SELECT identifiant, langue
																			FROM langue'
																			);
						$query4 = $bdd->prepare('SELECT a.identifiant, a.titre, a.auteur, p.prenom, p.nom, a.mot_cle, a.annee, a.revue, a.sujet, l.langue AS nom_langue
																			FROM article a, personne p, langue l
																			WHERE a.auteur = p.identifiant
																			AND a.langue = l.identifiant'
																			);
					?>

					<p>
						<!-- Formulaire pour l'Update d'un Article. -->
						<form method = "post" action = "../exec/articleUpdate.php">
							<p>
								<label for = "old_titre">Titre</label> : 
								<select name = "old_titre" id = "old_titre">
									<option value = "0"></option>
									<?php
										$query4->execute();
										while ($data = $query4->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['titre'] . '</option>';
										}
									?>
								</select>
								<label for = "new_titre"> remplac� par</label> :
								<input type = "text" name = "new_titre" id = "new_titre" /><br />
								<label for = "old_auteur">Auteur</label> : 
								<select name = "auteur" id = "auteur">
									<option value = "0"></option>
									<?php
										$query4->execute();
										while ($data = $query4->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom'] . ' ' . $data['nom'] . '</option>';
										}
									?>
								</select>
								<label for = "new_auteur"> remplac� par</label> : 
								<select name = "new_auteur" id = "new_auteur">
									<option value = "0"></option>
									<?php
										$query1->execute();
										while ($data = $query1->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom'] . ' ' . $data['nom'] . '</option>';
										}
									?>
								</select><br />
								<label for = "old_revue">Revue</label> : 
								<select name = "old_revue" id = "old_revue">
									<option value = "0"></option>
									<?php
										$query4->execute();
										while ($data = $query4->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['revue'] . '</option>';
										}
									?>
								</select>
								<label for = "new_revue"> remplac� par</label> : 
								<input type = "text" name = "revue" id = "revue" /><br />
								<label for = "old_sujet">Sujet</label> : 
								<select name = "old_sujet" id = "old_sujet">
									<option value = "0"></option>
									<?php
										$query4->execute();
										while ($data = $query4->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['sujet'] . '</option>';
										}
									?>
								</select>
								<label for = "new_sujet"> remplac� par</label> : 
								<select name = "new_sujet" id = "new_sujet">
									<option value = "0"></option>
									<?php
										$query2->execute();
										while ($data = $query2->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['nom'] . '</option>';
										}
									?>
								</select><br />
								<label for = "old_annee">Ann�e</label> : 
								<select name = "old_annee" id = "old_annee">
									<option value = "0"></option>
									<?php
										$query4->execute();
										while ($data = $query4->fetch()) {
											echo '<option value = "' . $data['identifiant'] . '">' . $data['annee'] . '</option>';
										}
									?>
								</select>
								<input type = "text" name = "new_annee" id = "new_annee" /><br />
								<label for = "old_langue">Langue</label> : 
								<select name = "old_langue" id = "old_langue">
									<option value = "0"></option>
									<?php
										$query4->execute();
										while ($data = $query4->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['nom_langue'] . '</option>';
										}
									?>
								</select>
								<label for = "new_langue"> remplac� par</label> : 
								<select name = "new_langue" id = "new_langue">
									<option value = "0"></option>
									<option value = "0"></option>
									<?php
										$query3->execute();
										while ($data = $query3->fetch()) {
											echo '<option value ="' . $data['identifiant'] . '">' . $data['langue'] . '</option>';
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
						$query4->closeCursor();
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
