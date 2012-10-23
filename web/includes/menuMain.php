<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : menuMain.php -->

<!-- Menu principal du site. -->
<div id = "menuMain">
	<ul>
		<li><a href = "../mainPage.php">Accueil</a></li>
		<?php if ($_SESSION['pseudo'] == 'sudo') { ?>
		<li><a href = "../input.php">Écriture</a></li>
		<?php } ?>
		<li><a href = "../output.php">Lecture</a></li>
		<li><a href = "../contact.php">Contacts</a></li>
		<li><a href = "../deconnect.php">Déconnexion</a></li>
	</ul>
<div>
