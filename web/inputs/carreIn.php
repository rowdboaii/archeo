<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : carreIn.php -->

<!-- Démarrage de la session pour les identifiants. -->
<?php	session_start(); ?>

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
		<title>CarreIn</title>
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
						$query = $bdd->prepare('SELECT c.locus AS id_locus, l.nom AS nom_locus
																			FROM carre c, locus l
																			WHERE c.locus = l.identifiant'
																		 	);
					?>

					<p>
						<!-- Formulaire pour un Carré. -->
						</p><form method = "post" action = "../inserts/carreInsert.php">
							<p>
								<label for = "nom">Nom</label> : <input type = "text" name = "nom" id = "nom"><br>
								<label for = "locus">Locus</label> : 
								<select name = "locus" id = "locus">
									<?php
										$query->execute();
										while ($data = $query->fetch()) {
											echo '<option value = "' . $data['id_locus'] . '">' . $data['nom_locus'] . '</option>';
										}
									?>
								</select><br />
								<input type = "submit" value = "Envoi" />
							</p>
						</form>
					</p>
					
					<?php $query->closeCursor(); ?>

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
