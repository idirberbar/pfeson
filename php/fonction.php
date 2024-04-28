<?php
#------------------------------------------------------ FONCTIONS CONNEXION ----------------------------------------------------------	
#Fonction #1Connexion : Vérifier qu'un utilisateur est authentifié
	function verif_connect_user() {

		#Si session existe, maintient
		session_start();
		
		#Désactivation du debugage
		error_reporting(0);
		
		#Vérifie si il n'y a aucune session active
		if($_SESSION['user']['username'] == "")
		{
			echo "<script> alert('Aucune session existante');window.location='../html/index.php#t3' </script>";
			exit();
		}
		else
		{
			return 1;
		}
	}


#Fonction #2Connexion : Vérifier l'existence d'un utilisateur
	function verif_exist_user($user, $connexion) {
		
		#Vérification de l'existance de l'identifiant
		$sql = "SELECT * FROM utilisateur WHERE identifiant='".mysqli_real_escape_string($connexion, $user)."'";
		$sql_login = mysqli_query($connexion, $sql) or die ( mysqli_error($connexion) );
		
		#L'identifiant n'existe
		if(mysqli_num_rows($sql_login) == 0)
		{
			return 0;
		}
		
		#L'identifiant existe
		else
		{
			return 1;
		}
	}

#Fonction #3Connexion : Vérifier la correspondance d'un utilisateur et d'un mot de passe
	function verif_match_user_password($user, $password, $connexion) {
		
		#Vérification correspondance Identifiant/MDP
		$sql_2 = "SELECT * FROM utilisateur WHERE identifiant='".mysqli_real_escape_string($connexion, $user)."' AND MotDePasse='".mysqli_real_escape_string($connexion, $password)."'";
		$sql_login_password = mysqli_query($connexion, $sql_2) or die ( mysqli_error($connexion) );
		
		#Correspondance Identifiant/MDP ne correspondent pas
		if (mysqli_num_rows($sql_login_password) == 0)
		{
			return 0;
		}
		
		#L'identifiant existe
		else
		{
			return 1;
		}	
	}
	
#Fonction #4Connexion : Récupérer le profil d'un utilisateur (admin ou user)
	function recup_profil($user, $password, $connexion) {
		
		#Récupération du rôle de l'utilisateur 
		$sql_3 = "SELECT profil FROM utilisateur WHERE identifiant='".mysqli_real_escape_string($connexion, $user)."' AND MotDePasse='".mysqli_real_escape_string($connexion, $password)."'";
		$sql_role = mysqli_query($connexion, $sql_3) or die ( mysqli_error($connexion) );
		
		#Conversion de la requête en Array
		$row = mysqli_fetch_array($sql_role);
		
		#Si l'utilisateur a le profil "utilisateur" 
		if(implode("|",$row) == "utilisateur|utilisateur")
		{
			return "utilisateur";
		}
		#Si l'utilisateur a le profil "administrateur"
		if(implode("|",$row) == "administrateur|administrateur")
		{
			return "administrateur";
		}
	}

#------------------------------------------------------ FONCTIONS INSCRIPTION --------------------------------------------------------	

#Fonction #1Inscription : Vérifier que le mail n'est pas déjà utilisé
	function verif_exist_mail($email, $connexion) {
		
		#Vérification de l'existance de l'identifiant
		$sql_4 = "SELECT * FROM utilisateur WHERE Messagerie='".mysqli_real_escape_string($connexion, $email)."@Sonatrach.dz'";
		$sql_email = mysqli_query($connexion, $sql_4) or die ( mysqli_error($connexion) );
		
		#L'@ de messagerie est déjà utilisée 
		if(mysqli_num_rows($sql_email) == 0)
		{
			return 0;
		}
		
		#L'@ de messagerie n'existe pas 
		else
		{
			return 1;
		}
	}
	
#Fonction #2Inscription : Créer l'utilisateur dans la BDD à partir du formulaire d'inscription
	function create_user($username, $password, $email, $connexion) {
		
		#Explose l'indentifiant dans un tableau
		$arr_nom = str_split($username);
		
		#Variable du nom de l'utilisateur
		$nom = "";
		for ($i = 1; $i < strlen($username); $i++) 
		{
			
			if($i == 1) 
			{
				#Si deuxième lettre -> en Majuscule
				$nom = $nom . strtoupper($arr_nom[$i]);
			}
			else
			{
				#Concaténation des autres lettres du nom
				$nom = $nom . $arr_nom[$i];
			}
		}
		
		#Mettre en Majuscule les premières lettres du email
		$email_up = "";
		
		#Explose l'adresse email dans un tableau
		$arr_messagerie = str_split($email);
		
		$afterPoint = False;

		for ($i = 0; $i < strlen($email); $i++) 
		{
			
			if($i == 0 || $afterPoint == True) 
			{
				#Si première lettre en Majuscule
				$email_up = $email_up . strtoupper($arr_messagerie[$i]);
				$afterPoint = False;
			}
			else
			{
				#Concaténation des autres lettres du nom
				$email_up = $email_up . $arr_messagerie[$i];
			}
			
			#Si la lettre est un point
			if($arr_messagerie[$i] == ".")
			{
				$afterPoint = True;
			}
		}
		
		#Requête SQL création de l'utilisateur
		$sql_5 = "INSERT INTO utilisateur (Identifiant, Nom, MotDePasse, Messagerie, Lieu, Actif, Profil) 
				  VALUES ('$username', '$nom', '$password', '$email_up@Sonatrach.dz', '', 'Oui', 'utilisateur');";
		$sql_createuser = mysqli_query($connexion, $sql_5) or die ( mysqli_error($connexion) );
		
		#Compte utilisateur créer et redirection vers la page de connexion
		echo "<script> alert('Compte pour $username créé');window.location='../html/index.php#t3' </script>";
		exit();
		
	}

#Fonction #3Inscription : Créer un utilisateur dans la BDD à partir du formulaire des admins
	function create_user_admin($username, $password, $email, $profil, $connexion) {
		
		#Explose l'indentifiant dans un tableau
		$arr_nom = str_split($username);
		
		#Variable du nom de l'utilisateur
		$nom = "";
		for ($i = 1; $i < strlen($username); $i++) 
		{
			
			if($i == 1) 
			{
				#Si deuxième lettre -> en Majuscule
				$nom = $nom . strtoupper($arr_nom[$i]);
			}
			else
			{
				#Concaténation des autres lettres du nom
				$nom = $nom . $arr_nom[$i];
			}
		}
		
		#Mettre en Majuscule les premières lettres du email
		$email_up = "";
		
		#Explose l'adresse email dans un tableau
		$arr_messagerie = str_split($email);
		
		$afterPoint = False;

		for ($i = 0; $i < strlen($email); $i++) 
		{
			
			if($i == 0 || $afterPoint == True) 
			{
				#Si première lettre en Majuscule
				$email_up = $email_up . strtoupper($arr_messagerie[$i]);
				$afterPoint = False;
			}
			else
			{
				#Concaténation des autres lettres du nom
				$email_up = $email_up . $arr_messagerie[$i];
			}
			
			#Si la lettre est un point
			if($arr_messagerie[$i] == ".")
			{
				$afterPoint = True;
			}
		} 

		#Requête SQL création de l'utilisateur
		$sql_5 = "INSERT INTO utilisateur (Identifiant, Nom, MotDePasse, Messagerie, Lieu, Actif, Profil) 
				  VALUES ('$username', '$nom', '$password', '$email_up@Sonatrach.dz', '', 'Oui', '$profil');";
		$sql_createuser = mysqli_query($connexion, $sql_5) or die ( mysqli_error($connexion) );
		
		#Compte utilisateur créer et redirection vers la page de connexion
		echo "<script> alert('Compte pour $username créé');window.location='../html/accueilAdmin.php#t4' </script>";
		exit();
		
	}

#Fonction #4Inscription : Formulaire de l'administrateur pour la création d'un compte (admin ou utilisateur)
	function form_create_user_admin($connexion) {
		
		require('config.php'); #On récupère le fichier de configuration pour la bdd

		#Création du formulaire pour l'ajout 
		echo "
		<form method=\"post\" action=\"../php/ajout_utilisateur.php\">
			<div class=\"saisieFlex\">
				<input type=\"text\" class=\"saisie\" name=\"nomUser\" placeholder=\"Nom d'utilisateur\" autofocus required/>
				<div id=\"adresseMail\">
					<input type=\"text\" id=\"preMail\" class=\"saisie\" name=\"email\" placeholder=\"Adresse mail\" pattern=\"[a-z]{3,}[.]{1}[a-z]{3,}\" required>
					<input type=\"text\"  id=\"sufMail\" class=\"saisie\" value=\"@Sonatrach.dz  \" disabled>
				</div>
				<input type=\"password\" class=\"saisie\" name=\"mdpUser\" placeholder=\"Mot de passe\" required/>
				<input list=\"listRole\" class=\"saisie\" name=\"listRole\" placeholder=\"Rôle de l'utilisateur\">
				<datalist id=\"listRole\">
					<option value=\"utilisateur\"</option>
					<option value=\"administrateur\"</option>
				</datalist>
			</div>
			<div class=\"btnFlex\">
				<input type=\"submit\" class=\"bouton\" name=\"btnIns\" value=\"Inscription\"/>
			</div>
		</form>";

	}
	
#-------------------------------------------------------- FONCTIONS INCIDENTS ---------------------------------------------------------

#Fonction #1Incidents : Affichage de l'ensemble des incidents des utilisateurs
	function view_admin_incidents($username, $connexion) {
		require('config.php'); #On récupère le fichier de configuration pour la bdd
		#Partie HTML
		echo "
		<table id=\"tableauAdmin\">
		<CAPTION>Visualisation des incidents</CAPTION>
			<thead>
				<tr>
					<th>Numéro d'incident</th>
					<th>Login</th>
					<th>Matériel</th>
					<th>Date</th>
					<th>Résumé</th>
					<th>Statut</th>
					<th>Validation</th>
				</tr>
			</thead>
		<tbody>";


		#Requête SQL visualisation des incidents administrateur
		$sql_6 = "SELECT * FROM incident ORDER BY DateIncident DESC;";
		$sql_view_incident_admin = mysqli_query($connexion, $sql_6) or die ( mysqli_error($connexion) );

		#Conversion de la requête en Array en fonction du nombre de lignes 
		$nb_elements = mysqli_num_rows($sql_view_incident_admin);

		
		#Compteur pour l'index des lignes sélectionnées
		$cpt = 1;

		echo "
		<form method=\"post\" action=\"../php/gestion_incidents.php\">";

		for($i = 0; $i < $nb_elements; $i++) {
			#Pour chaque tableau dans le tableau (auto-incrémentation)
			$row = mysqli_fetch_array($sql_view_incident_admin);
			#Nombre de tableau dans le tableau
			$nb_elements_ligne = (sizeof($row) /2);
			#Mise en forme des valeurs dans le code HTML
			echo "
				<tr>
					<td name=\"tab" . "$cpt\"><input type=\"hidden\" name=\"num_inc" . "$cpt\" value=" . $row[0] .">
						$row[0]
					</td>
					<td name=\"tab" . "$cpt\"><input type=\"hidden\" name=\"nom_login" . "$cpt\" value=" . $row[1] .">
						$row[1]
					</td>
					<td name=\"tab" . "$cpt\"><input type=\"hidden\" name=\"num_mat" . "$cpt\" value=" . $row[5] .">
						$row[5]
					</td>
					<td name=\"tab" . "$cpt\"><input type=\"hidden\" name=\"date" . "$cpt\" value=" . $row[2] .">
						$row[2]
					</td>
					<td name=\"tab" . "$cpt\"><input type=\"hidden\" name=\"resume" . "$cpt\" value=" . $row[3] .">
						$row[3]
					</td>
					<td name=\"tab" . "$cpt\"><input type=\"hidden\" name=\"statut" . "$cpt\" value=" . $row[4] .">
						$row[4]
					</td>";
					if($row[4] == "AT")
					{
						echo "
						<td>
							<input type=\"checkbox\" class=\"check\" name=\"check" . "$cpt\" />
						</td>";
					}
			echo "</tr>";

			#Incrémentation de l'index des lignes
			$cpt++;
		}

		#Nombre de ligne(s) dans le tableau des incidents
		echo "
					<input type=\"hidden\" name=\"num_lignes\"" . " value=\"" . $nb_elements . "\"/>
					<input type=\"submit\" id=\"validate\" class=\"bouton\" name=\"btnInc\" value=\"Validation\"/>
				</form>
			</tbody>
		</table>";
	}

#Fonction #2Incidents : Affichage des incidents d'un utilisateur
	function view_user_incidents($username, $connexion) {
		require('config.php'); #On récupère le fichier de configuration pour la bdd	
		#Partie HTML
		echo "
		<table id=\"tableauUser\">
		<CAPTION>Visualisation des incidents</CAPTION>
			<thead>
				<tr>
					<th>Numéro d'incident</th>
					<th>Login</th>
					<th>Matériel</th>
					<th>Date</th>
					<th>Résumé</th>
					<th>Statut</th>
				</tr>
			</thead>
			<tbody>";

		#Requête SQL visualisation des incidents
		$sql_7 = "SELECT * FROM incident WHERE LoginUtilisateur='".mysqli_real_escape_string($connexion, $username)."'ORDER BY DateIncident DESC;";
		$sql_view_incident = mysqli_query($connexion, $sql_7) or die ( mysqli_error($connexion) );

		#Conversion de la requête en Array en fonction du nombre de lignes 
		$nb_elements = mysqli_num_rows($sql_view_incident);

		
		#Compteur pour l'index des lignes sélectionnées
		$cpt = 1;


		for($i = 0; $i < $nb_elements; $i++) {
			#Pour chaque tableau dans le tableau (auto-incrémentation)
			$row = mysqli_fetch_array($sql_view_incident);
			#Nombre de tableau dans le tableau
			$nb_elements_ligne = (sizeof($row) /2);
			#Mise en forme des valeurs dans le code HTML
			echo "
				<tr>
					<td name=\"tab" . "$cpt\"><input type=\"hidden\" name=\"num_inc" . "$cpt\" value=" . $row[0] .">
						$row[0]
					</td>
					<td name=\"tab" . "$cpt\"><input type=\"hidden\" name=\"nom_login" . "$cpt\" value=" . $row[1] .">
						$row[1]
					</td>
					<td name=\"tab" . "$cpt\"><input type=\"hidden\" name=\"num_mat" . "$cpt\" value=" . $row[5] .">
						$row[5]
					</td>
					<td name=\"tab" . "$cpt\"><input type=\"hidden\" name=\"date" . "$cpt\" value=" . $row[2] .">
						$row[2]
					</td>
					<td name=\"tab" . "$cpt\"><input type=\"hidden\" name=\"resume" . "$cpt\" value=" . $row[3] .">
						$row[3]
					</td>
					<td name=\"tab" . "$cpt\"><input type=\"hidden\" name=\"statut" . "$cpt\" value=" . $row[4] .">
						$row[4]
					</td>
				</tr>";

			#Incrémentation de l'index des lignes
			$cpt++;
		}

		#Nombre de ligne(s) dans le tableau des incidents
		echo "
				<input type=\"hidden\" name=\"num_lignes\"" . " value=\"" . $nb_elements_ligne ."\"/>
				</tbody>
			</table>
		</form>";
	}


#-------------------------------------------------------- FONCTIONS MATERIELS ---------------------------------------------------------
#Fonction #1Materiels : Affichage des matériels de l'entreprise
	function view_materiels($connexion) {
		require('config.php'); #On récupère le fichier de configuration pour la bdd
		#Partie HTML
		echo "
		<table id=\"tableauMateriels\">
		<CAPTION>Visualisation des matériels</CAPTION>
			<thead>
				<tr>
					<th>Nom</th>
					<th>Fabricant</th>
					<th>Modèle</th>
					<th>Lieu</th>
					<th>IP</th>
					<th>Type</th>
				</tr>
			</thead>
			<tbody>";

		#Requête SQL visualisation des matériels
		$sql_8 = "SELECT * FROM materiel ORDER BY Type ;";
		$sql_view_materiel = mysqli_query($connexion, $sql_8) or die ( mysqli_error($connexion) );

		#Calcul du nombre de ligne totale
		$nb_elements = mysqli_num_rows($sql_view_materiel);

		for($i = 0; $i < $nb_elements; $i++) {
			#Pour chaque tableau dans le tableau (auto-incrémentation)
			$row = mysqli_fetch_array($sql_view_materiel);

			#Mise en forme des valeurs dans le code HTML
			if ($row != "")
			{
				echo "
				<tr>
					<td> $row[0] </td>
					<td> $row[1] </td>
					<td> $row[2] </td>
					<td> $row[3] </td>
					<td> $row[4] </td>
					<td> $row[5] </td>
				</tr>";
			}
		}

		# Fermeture des balises
		echo "
			</tbody>
		</table>";
			
	}


#Fonction #2Materiels : Récupérer le nom des matériels en liste pour les formulaires
	function form_liste_materiels($username, $connexion) {

		require('config.php'); #On récupère le fichier de configuration pour la bdd

		#Variable pour le nombre de matériel dans la bdd
		$sql_8 = "SELECT * FROM materiel;";
		$sql_8_query = mysqli_query($connexion, $sql_8) or die ( mysqli_error($connexion) );

		$nb_elements = mysqli_num_rows($sql_8_query);

		echo "
		<input list=\"listMateriels\" class=\"saisie\" name=\"listMateriels\" placeholder=\"Matériel concerné\">
		<datalist id=\"listMateriels\">";

		#Ajout de chaque matériel dans le menu déroulant
		for($i = 0; $i < $nb_elements; $i++) {

			#Pour chaque tableau dans le tableau (auto-incrémentation)
			$row = mysqli_fetch_array($sql_8_query);

			#Requête SQL pour récupérer le matériel d'indice i
			#sql_materiel_i = "SELECT * FROM materiel;";
			echo "
				<option value=\"$row[0]\"</option>
			";
		}

		echo "
		</datalist>";
	}

#Fonction #3Materiels : Vérifie l'existence d'un matériel
	function verif_existe_materiels($nom_mat, $connexion) {
				
		#Vérification de l'existance du nom de matériel
		$sql_11 = "SELECT Nom FROM materiel WHERE Nom = '".mysqli_real_escape_string($connexion, $nom_mat)."'" ;
		$sql_matExiste = mysqli_query($connexion, $sql_11) or die (mysqli_error($connexion));

		#Si le nom n'existe pas
		if (mysqli_num_rows($sql_matExiste) == 0)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}


#Fonction #4Materiels : Créer le formulaire d'ajout de matériel
	function form_create_materiels($connexion) {
		#On récupère le fichier de configuration pour la bdd
		require('config.php');

		#Création du formulaire
		echo "
		<form action=\"../php/ajout_materiel.php\" method=\"post\">
			<div class=\"doubleSaisieFlex\">
				<div class=\"saisieFlex\">
					<input type=\"text\" class=\"saisie\" name=\"nom_mat\" id=\"nom_mat\" placeholder=\"Nom du matériel\" required autofocus>
					<input type=\"text\" class=\"saisie\" name=\"fabricant_mat\" id=\"fabricant_mat\" placeholder=\"Nom du fabricant\" required>
					<input type=\"text\" class=\"saisie\" name=\"modele_mat\" id=\"modele_mat\" placeholder=\"Nom du modèle\" required>
				</div>
				<div class=\"saisieFlex\">
					<input type=\"text\" class=\"saisie\" name=\"lieu_mat\" id=\"lieu_mat\" placeholder=\"Localisation du matériel\" required>
					<input type=\"text\" class=\"saisie\" name=\"type_mat\" id=\"type_mat\" placeholder=\"Type de matériel\" required>
					<input type=\"text\" class=\"saisie\" name=\"ip_mat\" id=\"ip_mat\" placeholder=\"Adresse IP du matériel\" pattern=\"[[0-9]{1,3}[.][0-9]{1,3}[.][0-9]{1,3}[.][0-9]{1,3}]+\">
				</div>
			</div>
			<div class=\"btnFlex\">
				<input type=\"submit\" class=\"bouton\" value=\"Ajout du matériel\">
			</div>
		</form>
		";
	}


#Fonction #5Materiels : Requête d'ajout de matériel
	function request_create_materiels($connexion, $nom_mat, $fabricant_mat, $modele_mat, $lieu_mat, $ip_mat, $type_mat) {

		$sql_13 = "INSERT INTO materiel (Nom, Fabricant, Modele, Lieu, IP, Type)
					VALUES ('$nom_mat', '$fabricant_mat', '$modele_mat', '$lieu_mat', '$ip_mat', '$type_mat');";
		$sql_creatMat = mysqli_query($connexion, $sql_13) or die (mysqli_error($connexion));

		echo "<script> alert('Matériel $nom_mat créé');window.location='../html/accueilAdmin.php#t5' </script>";
		exit();
	}

#-------------------------------------------------------- FONCTIONS UTILISATEUR -------------------------------------------------------
#Fonction #1Utilisateur : Affichage des utilisateurs existants
	function view_user($connexion) {

		require('config.php'); #On récupère le fichier de configuration pour la bdd

		#Partie HTML
		echo "
		<table id=\"tableauAdminUser\">
		<CAPTION>Visualisation des utilisateurs</CAPTION>
			<thead>
				<tr>
					<th>Identifiant</th>
					<th>Nom</th>
					<th>Messagerie</th>
					<th>Actif</th>
					<th>Profil</th>
				</tr>
			</thead>
			<tbody>";

		#Requête SQL visualisation des matériels
		$sql_10 = "SELECT * FROM utilisateur;";
		$sql_view_utilisateur = mysqli_query($connexion, $sql_10) or die ( mysqli_error($connexion) );

		#Calcul du nombre de ligne totale
		$nb_elements = mysqli_num_rows($sql_view_utilisateur);

		#Nombre de page total
		#$nb_pages = ceil($nb_elements / $nb_materiel_affich);

		for($i = 0; $i < $nb_elements; $i++) {
			#Pour chaque tableau dans le tableau (auto-incrémentation)
			$row = mysqli_fetch_array($sql_view_utilisateur);

			#Mise en forme des valeurs dans le code HTML
			if ($row != "")
			{
				echo "
				<tr>
					<td> $row[0] </td>
					<td> $row[1] </td>
					<td> $row[3] </td>
					<td> $row[5] </td>
					<td> $row[6] </td>
				</tr>";
			}
		}

		# Fermeture des balises
		echo "
			</tbody>
		</table>";
	}


#---------------------------------------------------------- FONCTIONS BUILD -----------------------------------------------------------

#Fonction #1Build : Création de l'en-tête jusqu'au header
	function build_header() {

		#Si session existe, maintient
		session_start();

		echo "<!DOCTYPE html>
		<html lang=\"fr\">
		<head>
		<!-- Encodage -->
			<meta charset=\"UTF-8\">

		<!-- Lien vers la feuille de style -->
			<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/styles.css\">

		<!-- Lien pour la police d\'écriture -->
			<link href=\"https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap\" rel=\"stylesheet\">
			
		<!-- Lien pour l'icône de l'onglet -->
			<link rel=\"shortcut icon\" href=\"../img/tool.ico\" type=\"image/x-icon\">

		</head>";
	}
	
?>