<?php
	#Connexion à la base de données
	$DB_server = 'localhost';
	$DB_user = 'root';
	$DB_password = '';
	$DB_base = 'gestion_bdd';
	
	#Connexion server
	$connexion = mysqli_connect($DB_server, $DB_user, $DB_password) or die (mysqli_error().' sur la ligne '.__LINE__);
	
	#Connexion BDD
	mysqli_select_db($connexion, $DB_base) or die (mysqli_error().' sur la ligne '.__LINE__);
?>