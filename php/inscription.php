<?php
    #Import
    include 'fonction.php';

    #Formulaire d'inscription
    if (isset($_POST['nomIns']) && isset($_POST['mdtIns']) && isset($_POST['email']) && isset($_POST['SON']) && isset($_POST['poste'])) {
        
        require('config.php'); #On récupère le fichier de configuration pour la bdd
        
        #Récupération des information POST
        $login = $_POST['nomIns'];
        $password = $_POST['mdtIns'];
        $email = $_POST['email'];
        $SON = $_POST['SON']; // Nouveau champ SON
        $poste = $_POST['poste']; // Nouveau champ poste
        $Result = verif_exist_user($login, $connexion);
        
        #Fonction #2Connexion : Vérifier l'existedence d'un utilisateur
        if(verif_exist_user($login, $connexion) == 0)
        {
            #L'utilisateur n'existe pas
            
            #Fonction #1Inscription : Vérifier que le mail n'est pas déjà utilisé
            if(verif_exist_mail($email, $connexion) == 0)
            {   
                #Fonction #2Inscription : Créer l'utilisateur dans la BDD à partir du formulaire d'inscription
                create_user($login, $password, $email, $connexion, $SON, $poste); // Passer les champs SON et poste
            }
            else
            {
                echo "<script> alert('L'adresse de messagerie : $email est déjà utilisée');window.location='../html/index.php#t2' </script>";
            }
        }
        #L'utilisateur existe déjà
        else 
        {
            echo "<script> alert('L\'utilisateur $login existe déjà');window.location='../html/index.php#t2' </script>";
        }
    }
?>
