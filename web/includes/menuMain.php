<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : menuMain.php -->

<!-- Menu principal du site. -->
<div id = "menuMain">
	<ul>
		<li><a href = "../mainPage.php">Accueil</a></li>
		<li><a href = "../output.php">Lecture</a></li>

		<!-- Vérification du type d'utilisateur. -->
		<?php if ($_SESSION['pseudo'] == 'sudo') { ?>
		<li><a href = "../input.php">Écriture</a></li>
		<li><a href = "../update.php">Modification</a></li>
		<li><a href = "../delete.php">Suppression</a></li>
		<li><a href = "../parameter.php">Paramètres</a></li>
		<?php } ?>
		
		<li><a href = "../contact.php">Contacts</a></li>
		<li><a href = "../deconnect.php">Déconnexion</a></li>
	</ul>
<div>

