<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : OsUp.php -->

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
		<title>OsUp</title>
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
					<?php include('../includes/menuMain2.php'); ?>

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

						/* Récupération des données de la base. */

						$query1 = $bdd->prepare('SELECT o.identifiant, o.nom
										FROM objet o, objetnature n
										WHERE o.nature = n.identifiant
										AND n.nature = \'os\''
										);
						$query2 = $bdd->prepare('SELECT identifiant, taxon
										FROM osTaxon'
										);
						$query3 = $bdd->prepare('SELECT o.nom AS nom_objet, s.partie, s.type, t.taxon AS nom_taxon, s.animal, s.type_animal, s.forme, s.dissous,
										s.morsure, s.conservation, s.datation, s.objet, s.taxon
										FROM os s, objet o, ostaxon t
										WHERE s.objet = o.identifiant
										AND s.taxon = t.identifiant'
										);
					?>

					<p>
						<!-- Formulaire sur le choix du champ à modifier. -->
						<form method = "post" action = "osUp.php">
							<p>
								<label for = "champ">Champ à modifier</label> :
								<select name = "champ" id = "champ">
									<option value = "0"></option>
									<option value = "objet">objet</option>
									<option value = "partie">partie</option>
									<option value = "type">type</option>
									<option value = "taxon">taxon</option>
									<option value = "animal">animal</option>
									<option value = "type_animal">type animal</option>
									<option value = "forme">forme</option>
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
						<!-- Formulaire pour l'Update d'un Os. -->
						<form method = "post" action = "../exec/osUpdate.php">
							<p>
								<?php if ($_SESSION['champ'] == "objet") { ?>
									<label for = "old">Objet</label> :
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
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

								<?php if ($_SESSION['champ'] == "partie") { ?>
									<label for = "old">Partie Animal</label> :
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value ="' . $data['partie'] . '">' . $data['nom_objet'] . ' : ' . $data['partie'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> :
									<input type = "text" name = "new" id = "new" /><br />
								<?php } ?>

								<?php if ($_SESSION['champ'] == "type") { ?>
									<label for = "old">Type Os</label> :
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value ="' . $data['type'] . '">' . $data['nom_objet'] . ' : ' . $data['type'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> :
									<input type = "text" name = "new" id = "new" /><br />
								<?php } ?>

								<?php if ($_SESSION['champ'] == "taxon") { ?>
									<label for = "old">Taxon</label> :
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value ="' . $data['taxon'] . '">' . $data['nom_objet'] . ' : ' . $data['nom_taxon'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> :
									<select name = "new" id = "new">
										<option value = "0"></option>
										<?php
											$query2->execute();
											while ($data = $query2->fetch()) {
												echo '<option value ="' . $data['identifiant'] . '">' . $data['taxon'] . '</option>';
											}
										?>
									</select>
									<a href = "../parameters/taxon.php">Ajouter un nouveau Taxon ?</a><br />
								<?php } ?>

								<?php if ($_SESSION['champ'] == "animal") { ?>
									<label for = "old">Animal</label> :
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value ="' . $data['animal'] . '">' . $data['nom_objet'] . ' : ' . $data['animal'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> :
									<input type = "text" name = "new" id = "new" /><br />
								<?php } ?>

								<?php if ($_SESSION['champ'] == "type_animal") { ?>
									<label for = "old">Type d'Animal</label> :
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value ="' . $data['type_animal'] . '">' . $data['nom_objet'] . ' : ' . $data['type_animal'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> :
									<input type = "text" name = "new" id = "new" /><br />
								<?php } ?>

								<?php if ($_SESSION['champ'] == "forme") { ?>
									<label for = "old">Forme</label> :
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value ="' . $data['forme'] . '">' . $data['nom_objet'] . ' : ' . $data['forme'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> :
									<input type = "text" name = "new" id = "new" /><br />
								<?php } ?>

								<?php if ($_SESSION['champ'] == "datation") { ?>
									<label for = "old">Datation</label> :
									<select name = "old" id = "old">
										<option value = "0"></option>
										<?php
											$query3->execute();
											while ($data = $query3->fetch()) {
												echo '<option value ="' . $data['datation'] . '">' . $data['nom_objet'] . ' : ' . $data['datation'] . '</option>';
											}
										?>
									</select>
									<label for = "new"> remplacé par</label> :
									<input type = "date" name = "new" id = "new" /> (jj/mm/aaaa)<br />
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
