<?php 
	#Import
	    include '../php/fonction.php';

    #Fonction #1Connexion : Vérifier qu'un utilisateur est authentifié
        if (verif_connect_user() == 0)
        {
            echo "<script> alert('Aucune session existante');window.location='../html/index.php#t3' </script>";	
            exit();
        }
        else
        {
            $username = $_SESSION['user']['username'];
        }
    	
    #Fonction #1Build : Création de l'en-tête jusqu'au header
        build_header();
?>

<!-- Titre de l\'onglet dans le navigateur -->
    <title>IGII - Accueil</title>

    <body>

        <div class="ct" id="t1">
            <div class="ct" id="t2">
                <div class="ct" id="t3">

                <!-- Menu -->
                    <nav>
                        <ul id="top">
                            <a href="#t1"><li class="icone"><img src="../img/home.png" alt="Accueil"></li></a>
                            <span id="userName"><?php echo $username; ?></span>
                        </ul>

                        <ul id="middle">
                            <a href="#t2"><li class="lien" id="dos">Signaler</li></a>
                            <a href="#t3"><li class="lien" id="tres">Incidents</li></a>
                        </ul>

                        <ul id="bottom">
                            <!-- <a href="../php/deconnexion.php"><li class="icone"><img src="../img/exit.png" alt="Déconnexion"></li></a> -->
                            <a href="../php/deconnexion.php" onclick="confirmerDeconnexion();"><li class="icone"><img src="../img/exit.png" alt="Déconnexion"></li></a>

                        </ul>
                    </nav>


                <!-- 1 - Accueil -->
                    <div class="page" id="p1">
                        <section class="accueil">
                            <img src="../img/computer.png" alt="Icône">
                            <h1>Interface de gestion des incidents informatiques</h1>
                            <h2 class="phraseAccueil">Bienvenue sur votre espace personnel <br>
                                <span id="sousPhraseAccueil"> <?php echo $username; ?> </span>
                            </h2>
                        </section>  
                    </div>


                <!-- 2 - Signaler un incident-->
                    <div class="page" id="p2">
                        <section class="section formulaire">
                            <div class="titreFlex">
                                <h3>Signaler un incident</h3>
                            </div>

                            <form method="post" action="../php/ajout_incident.php">
                                <div class="saisieFlex">
                                    <?php
                                        #Fonction #2Materiels : Récupérer le nom des matériels en liste pour les formulaires
                                        form_liste_materiels($username, $connexion);
                                    ?>
                                    <textarea name="resume_incident" class="saisie" id="resume_incident" placeholder="Résumé de l'incident" rows="8" cols="20" required></textarea>
                                </div>
                                <div class="btnFlex">
                                    <input type="submit" class="bouton" name="btnInc" value="Valider"/>
                                </div>
                            </form>
                        </section>
                    </div>

                    
                <!-- 3 - Tableau incidents -->
                    <div class="page" id="p3">
                        <section class="section" id="tableauIncUser">
                            <?php
                                #Fonction #2Incidents : Affichage des incidents d'un utilisateur
                                view_user_incidents($username, $connexion);
                            ?>
                            <a href="#t2"><button class="bouton" id="btnAjoutInc">Signaler un incident</button></a>
                        </section>
                    </div>


                </div>
            </div>
        </div>
        <script>
function confirmerDeconnexion() {
    if (confirm("Êtes-vous sûr de vouloir vous déconnecter ?")) {
        // Si l'utilisateur confirme, redirigez vers la page de déconnexion
        window.location.href = "../php/deconnexion.php";
    }
    // Si l'utilisateur annule, ne faites rien
}
</script>
    </body>
</html>