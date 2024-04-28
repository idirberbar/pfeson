<?php

	#Déconnexion de l'utilisateur
	session_start();
	
	if (isset($_SESSION))
	{
		unset($_SESSION);
		session_unset();
		session_destroy();
	}

	#Redirection sur la page d'accueil de connexion
	echo "<script> window.location='../html/index.php#t3' </script>";
?>