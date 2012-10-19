<?php
		$archeo = 'pgsql:host=localhost;dbname=archeo';
		$user = 'jehu';
		$pass = 'choucroute';
			
	try {
		$bdd = new PDO($archeo, $user, $pass);
		print "Connecté !";
		$dbh = null;
	} catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
?>
