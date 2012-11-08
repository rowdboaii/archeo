<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Xavier Muth & Antoine Hars -->
<!-- Fichier : menuMain.php -->

<!-- Menu principal du site. -->
<ul id = "menuMain">
	<li class = "buttonLeft"><a href = "../mainPage.php">Accueil</a></li>
	<li class = "buttonLeft"><a href = "../output.php">Lecture</a></li>

	<!-- Vérification du type d'utilisateur. -->
	<?php if ($_SESSION['pseudo'] == 'sudo') { ?>

	<li class = "buttonLeft"><a href = "../input.php">Écriture</a></li>
	<li class = "buttonLeft"><a href = "../update.php">Modification</a></li>
	<li class = "buttonLeft"><a href = "../delete.php">Suppression</a></li>
	<li class = "buttonLeft"><a href = "../parameter.php">Paramètres</a></li>
	<?php } ?>
	
	<li class = "buttonRight"><a href = "../contact.php">Contacts</a></li>
	<li class = "buttonRight"><a href = "../deconnect.php">Déconnexion</a></li>
</ul>


