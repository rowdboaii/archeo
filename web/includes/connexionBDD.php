<!-- Sujet : Projet de base de données pour des fouilles archéologiques. -->
<!-- Auteur : Antoine Hars -->
<!-- Fichier : connexionBDD.php -->

<?php
		$archeo = 'pgsql:host=localhost;dbname=archeo';
		$user = 'jehu';
		$pass = 'choucroute';

	try {
		$bdd = new PDO($archeo, $user, $pass);
	} catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
?>
