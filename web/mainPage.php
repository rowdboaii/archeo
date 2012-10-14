<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : mainIndex.htm -->

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
		<title></title>
	</head>

	<body>
	  <!-- Corps de la page. -->
		<div id = "">

			<header>
				<!-- Header de la page. -->
				<div id = "">
				
				</div>
			</header>

			<?php
				if (isset($_POST['pseudo']) AND isset($_POST['mdp']))
				{
					if ($_POST['pseudo'] == "sudo" AND $_POST['mdp'] == "password")
					{
			?>			
				
			<nav>
				<!-- Principaux liens de navigation de la page. -->
				<div id = "">

				</div>
			</nav>

			<aside>				
				<!-- Menu latéral spécifique au lien visité. -->
				<div id = "">

				</div>
			</aside>

			<section>
				<!-- Section de page. -->
				<div id = "">

					<p>
						Quibus occurrere bene pertinax miles explicatis ordinibus parans hastisque feriens scuta qui habitus iram pugnantium concitat et dolorem proximos iam gestu 										terrebat sed eum in certamen alacriter consurgentem revocavere ductores rati intempestivum anceps subire certamen cum haut longe muri distarent, quorum tutela 											securitas poterat in solido locari cunctorum.
					</p>

				</div>
			</section>
						
			<?php
					}
					else
					{
						echo 'Mauvais login et mdp.';
						echo '<br /><br /><a href = "index.php">Page de connexion</a>';
					}
				}
				else
				{
					echo 'Absence de login et de mdp.';
					echo '<br /><br /><a href = "index.php">Page de connexion</a>';
				}
			?>
			
			<footer>
				<!-- Pied de la page. -->
				<?php include("includes/piedPage.php"); ?>				
			</footer>

		</div>
	</body>

</html>
