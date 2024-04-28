<?php

    #Import
	include 'fonction.php';

	#Si session existe, maintient
	session_start();
	
	for ($i = 0; $i < $_POST['num_lignes']; $i++) {

		#Récupération des informations pour les lignes cochées
		if (isset($_POST['check' . $i])) {

			require('config.php'); #On récupère le fichier de configuration pour la bdd
			
			$NumeroIncident = $_POST['num_inc' . $i];
			$Date = $_POST['date' . $i];

			#Requête SQL pour la modification du statut de l'incident 
			$sql_7 = "UPDATE incident SET statut = 'R' WHERE NumeroIncident = '$NumeroIncident';";
					
			#Requête pour mettre à jour le status du ou des incidents
			$sql_update_incident = mysqli_query($connexion, $sql_7) or die ( mysqli_error($connexion) );
		}
	}

	#Affichage d'avertissement de mise à jour et redirection vers la page des incidents 
		echo "<script> alert('Mise à jour OK');window.location='../html/accueilAdmin.php#t2' </script>";
		exit();
?>