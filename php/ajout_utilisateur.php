<?php
	#Import
	include 'fonction.php';

	#Formulaire d'inscription
	if (isset($_POST['nomUser']) && isset($_POST['mdpUser']) && isset($_POST['email']) && isset($_POST['listRole'])) {
			
		require('config.php'); #On récupère le fichier de configuration pour la bdd
		
		#Récupération des information POST
		$login = $_POST['nomUser'];
		$password = $_POST['mdpUser'];
        $email = $_POST['email'];
        $role = $_POST['listRole'];
		$Result = verif_exist_user($login, $connexion);
		
#1		#Fonction qui permet de vérifier l'existence d'un utilisateur #1
		if(verif_exist_user($login, $connexion) == 0)
		{
			#L'utilisateur n'existe pas
			
#4			#Fonction qui permet de vérifier si l'adresse de messagerie est disponible
			if(verif_exist_mail($email, $connexion) == 0)
			{	
				#Création de l'utilisateur dans la bdd
				create_user_admin($login, $password, $email, $role, $connexion);	
			}
			else
			{
				echo "<script> alert('L'adresse de messagerie : $email est déjà utilisée');window.location='../html/accueilAdmin.php#t6' </script>";
			}
		}
		#L'utilisateur existe déjà
		else 
		{
			echo "<script> alert('L\'utilisateur $login existe déjà');window.location='../html/accueilAdmin.php#t6' </script>";
		}
	}
?>