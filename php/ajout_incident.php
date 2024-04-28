<?php

    #Import
	include 'fonction.php';

	#Si session existe, maintient
    session_start();
    
    #Récupération des informations pour le résumé de l'incident
		if (isset($_POST['resume_incident']) && isset($_POST['listMateriels'])) {

            require('config.php'); #On récupère le fichier de configuration pour la bdd

            $materiel = $_POST['listMateriels'];

            #Récupération du dernier indice 
            $sql_query_num_max = "SELECT MAX(NumeroIncident) FROM incident";
            $sql_num_max = mysqli_query($connexion, $sql_query_num_max) or die ( mysqli_error($connexion) );
            $sql_result = mysqli_fetch_array($sql_num_max);
            $num_max = (int)$sql_result[0] + 1; 

            #Récupération nom utilisateur 
            $username = $_SESSION['user']['username'];

            #Récupération de la date du jour 
            $date_actuelle = date('Y-m-d');

            #Récupération du résumé de l'incident 
            $resume_incident = $_POST['resume_incident'];

            #Statut ('AT' par défaut)
            $statut = "AT";

            #Récupération du nom du matériel
            $nom_materiel = $_POST['listMateriels'];

            $sql_query = "INSERT INTO incident (NumeroIncident, LoginUtilisateur, DateIncident, Resume, Statut, NomMateriel) 
                          VALUES ('$num_max', '$username', '$date_actuelle', '$resume_incident', '$statut', '$nom_materiel');";


            #Requête pour mettre à jour le status du ou des incidents
            $sql_ajout_incident = mysqli_query($connexion, $sql_query) or die ( mysqli_error($connexion) );
            
            #Affichage d'avertissement de mise à jour et redirection vers la page des incidents 
            echo "<script> alert('Merci $username, d\'avoir signalé cet incident');window.location='../html/accueilUser.php#t3' </script>";
            exit();
		}
?>