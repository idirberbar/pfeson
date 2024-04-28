<?php
	#Rajouter un contrôle de bruteforce !
	
	#Import
	include 'fonction.php';
	
	#Formulaire de connexion
	if (isset($_POST['nomCon']) && isset($_POST['mdtCon']))
	{
		require('config.php'); #On récupère le fichier de configuration pour la bdd
		#Récupération des information POST
		$login = $_POST['nomCon'];
		$password = $_POST['mdtCon'];
		
#1		#Fonction #2Connexion : Vérifier l'existence d'un utilisateur
		if(verif_exist_user($login, $connexion) == 0)
		{
			#L'identifiant n'existe pas
			echo "<script> alert('Identificant incorrect');window.location='../html/index.php#t3' </script>";
			exit();
		}
		
		#L'identifiant existe 
		else
		{
#2			#Fonction #3Connexion : Vérifier la correspondance d'un utilisateur et d'un mot de passe
			if (verif_match_user_password($login, $password, $connexion) == 0)
			{
				#L'identifiant ou le mot de passe est inccorect
				echo "<script> alert('Identificant ou mot de passe incorrect');window.location='../html/index.php#t3' </script>";	
				exit();
			}
			
			#Identification réussie
			else
			{
				#Récupération du rôle de l'utilisateur 
				$sql_3 = "SELECT profil FROM utilisateur WHERE identifiant='".mysqli_real_escape_string($connexion, $login)."' AND MotDePasse='".mysqli_real_escape_string($connexion, $password)."'";
				$sql_role = mysqli_query($connexion, $sql_3) or die ( mysqli_error($connexion) );
				#Conversion de la requête en Array
				$row = mysqli_fetch_array($sql_role);
				
#3				#Fonction #4Connexion : Récupérer le profil d'un utilisateur (admin ou user)
				# Si l'utilisateur a le profil "utilisateur"
				if(recup_profil($login, $password, $connexion) == "utilisateur")
				{
					session_start();
					$_SESSION['user'] = [
					'username' => $login,
					'role' => 'utilisateur'
					];
					echo "<script> window.location='../html/accueilUser.php#t1' </script>";
				}
#3				#Si l'utilisateur a le profil "administrateur"
				if(recup_profil($login, $password, $connexion) == "administrateur")
				{
					session_start();
					$_SESSION['user'] = [
					'username' => $login,
					'role' => 'administrateur'
					];
					echo "<script> window.location='../html/accueilAdmin.php#t1' </script>";
				}
			}
		}
	}
?>