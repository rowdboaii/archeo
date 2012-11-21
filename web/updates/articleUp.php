<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : articleUp.php -->

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
						$query1 = $bdd->prepare('SELECT identifiant, prenom, nom
										FROM personne'
										);
						$query2 = $bdd->prepare('SELECT identifiant, nom
										FROM locus'
										);
						$query3 = $bdd->prepare('SELECT identifiant, langue
										FROM langue'
										);
						$query4 = $bdd->prepare('SELECT a.identifiant, a.titre, a.auteur, p.prenom, p.nom, a.mot_cle, a.annee, a.revue, a.sujet,
										l.langue AS nom_langue, a.auteur, a.langue, a.type_sujet
										FROM article a, personne p, langue l
										WHERE a.auteur = p.identifiant
										AND a.langue = l.identifiant'
										);
						$query5 = $bdd->prepare('SELECT identifiant, nom
										FROM region'
										);
						$query6 = $bdd->prepare('SELECT identifiant, nom
										FROM site'
										);
					?>

					<p>
						<!-- Formulaire sur le choix du champ à modifier. -->
						<form method = "post" action = "articleUp.php">
							<p>
								<label for = "champ">Champ à modifier</label> : 
								<select name = "champ" id = "champ">
									<option value = "0"></option>
									<option value = "titre">titre</option>
									<option value = "auteur">auteur</option>
									<option value = "annee">année</option>
									<option value = "revue">revue</option>
									<option value = "sujet">sujet</option>
									<option value = "type_sujet">Type de sujet</option>
									<option value = "langue">langue</option>
									<option value = "mot_cle">mots clé</option>
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
						<!-- Formulaire pour l'Update d'un article. -->
						<form method = "post" action = "../exec/articleUpdate.php">
							<p>
								<?php if ($_SESSION['champ'] == "titre") { ?>
									<label for = "old">Titre</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query4->execute();
											while ($data = $query4->fetch()) {
												echo '<option value = "' . $data['titre'] . '">' . $data['titre'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> :
									<input type = "text" name = "new" id = "new" /><br />
								<?php } ?>
					
								<?php if ($_SESSION['champ'] == "auteur") { ?>
									<label for = "old">Auteur</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query4->execute();
											while ($data = $query4->fetch()) {
												echo '<option value = "' . $data['auteur'] . '">' . $data['titre'] . ' : ' . $data['prenom'] . ' ' . $data['nom'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<select name = "new" id = "new">
										<option value = "0"></option>
										<?php
											$query1->execute();
											while ($data = $query1->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . $data['prenom'] . ' ' . $data['nom'] . '</option>';
											}
										?>
									</select> 
									<a href = "../inputs/personneIn.php">Ajouter un nouvelle Personne ?</a><br />
								<?php } ?>
					
								<?php if ($_SESSION['champ'] == "annee") { ?>
									<label for = "old">Année</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query4->execute();
											while ($data = $query4->fetch()) {
												echo '<option value = "' . $data['annee'] . '">' . $data['titre'] . ' : ' . $data['annee'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<input type = "date" name = "new" id = "new" /> (jj/mm/aaaa)<br />
								<?php } ?>
					
								<?php if ($_SESSION['champ'] == "revue") { ?>
									<label for = "old">Revue</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query4->execute();
											while ($data = $query4->fetch()) {
												echo '<option value = "' . $data['revue'] . '">' . $data['titre'] . ' : ' . $data['revue'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<input type = "text" name = "new" id = "new" /><br />
								<?php } ?>
							
								<?php if ($_SESSION['champ'] == "sujet") { ?>
									<label for = "old">Sujet</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query4->execute();
											while ($data = $query4->fetch()) {
												echo '<option value = "' . $data['sujet'] . '">' . $data['titre'] . ' : ' . $data['sujet'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<select name = "new" id = "new">
										<option value = "0"></option>
										<?php
											$query2->execute();
											while ($data = $query2->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . 'Locus ' . $data['nom'] . '</option>';
											}
											$query5->execute();
											while ($data = $query2->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . 'Région ' . $data['nom'] . '</option>';
											}
											$query6->execute();
											while ($data = $query2->fetch()) {
												echo '<option value = "' . $data['identifiant'] . '">' . 'Site ' . $data['nom'] . '</option>';
											}
										?>
									</select> 
									<a href = "../inputs/locusIn.php">Ajouter un nouveau Locus ?</a> 
									<a href = "../inputs/regionIn.php">une nouvelle Région ?</a> 
									<a href = "../inputs/siteIn.php">un nouveau Site ?</a><br />
								<?php } ?>

								<?php if ($_SESSION['champ'] == "type_sujet") { ?>
									<label for = "old">Type de Sujet</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query4->execute();
											while ($data = $query4->fetch()) {
												echo '<option value = "' . $data['type_sujet'] . '">' . $data['titre'] . $data['type_sujet'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<select name = "new" id = "new">
										<option value = "locus">locus</option>
										<option value = "region">région</option>
										<option value = "site">site</option>
									</select><br />
								<?php } ?>

								<?php if ($_SESSION['champ'] == "langue") { ?>
									<label for = "old">Langue</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query4->execute();
											while ($data = $query4->fetch()) {
												echo '<option value ="' . $data['langue'] . '">' . $data['titre'] . ' : ' . $data['nom_langue'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<select name = "new" id = "new">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value ="' . $data['identifiant'] . '">' . $data['langue'] . '</option>';
											}
										?>
									</select> 
									<a href = "../parameters/langue.php">Ajouter une nouvelle Langue ?</a><br />
								<?php } ?>

								<?php if ($_SESSION['champ'] == "mot_cle") { ?>
									<label for = "old">Mots clé</label> : 
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query4->execute();
											while ($data = $query4->fetch()) {
												echo '<option value ="' . $data['mot_cle'] . '">' . $data['titre'] . ' : ' . $data['mot_cle'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> : 
									<input type = "text" name = "new" id = "new" width = "30px" height = "5px" /><br />
								<?php } ?>

								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>
					<?php } ?>

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
