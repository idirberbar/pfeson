<?php
    #Import
    include 'fonction.php';
    
    if (isset($_POST['nom_mat']) && isset($_POST['fabricant_mat']) && isset($_POST['modele_mat']) && isset($_POST['lieu_mat']) && isset($_POST['type_mat']))
    {
        require('config.php');

        #Récupération des données
        $nom_mat = $_POST['nom_mat'];
        $fabricant_mat = $_POST['fabricant_mat'];
        $modele_mat = $_POST['modele_mat'];
        $lieu_mat = $_POST['lieu_mat'];
        $type_mat = $_POST['type_mat'];
        $ip_mat = $_POST['ip_mat'];

        #Fonction #3Materiels : Vérifie l'existence d'un matériel
        if (verif_existe_materiels($nom_mat, $connexion) == 0)
        {
            #Fonction #5Materiels : Requête d'ajout de matériel
            request_create_materiels($connexion, $nom_mat, $fabricant_mat, $modele_mat, $lieu_mat, $ip_mat, $type_mat);
            
        }
        else
        {
            echo "<script> alert('Le nom de matériel : $nom_mat, est déjà utilisé'); window.location='../html/accueilAdmin.php#t5' </script>";
        }
    }
?>