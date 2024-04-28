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
                    <div class="ct" id="t4">
                        <div class="ct" id="t5">
                            <div class="ct" id="t6">

                            <!-- Menu -->
                                <nav>
                                    <ul id="top">
                                        <a href="#t1"><li class="icone"><img src="../img/home.png" alt="Accueil"></li></a>
                                        <span id="userName"><?php echo $username; ?></span>
                                       
                                    </ul>

                                    <ul id="middle">
                                        <a href="#t2"><li class="lien" id="dos">Incidents</li></a>
                                        <a href="#t3"><li class="lien" id="tres">Matériels</li></a>
                                        <a href="#t4"><li class="lien" id="quatro">Utilisateurs</li></a>
                                    </ul>

                                    <ul id="bottom">
                                        <a onclick="confirmerDeconnexion();" href="../php/deconnexion.php"><li class="icone"><img src="../img/exit.png" alt="Déconnexion"></li></a>
                                    </ul>
                                </nav>


                            <!-- 1 - Accueil -->
                                <div class="page" id="p1">
                                    <section class="accueil">
                                        <img src="../img/computer.png" alt="Icône">
                                        <h1>Interface de gestion des incidents informatiques</h1>
                                        <h2 class="phraseAccueil">Vous êtes connecté en tant qu'administrateur <br>
                                            <span id="sousPhraseAccueil"> <?php echo $username; ?> </span>
                                        </h2>
                                    </section>  
                                </div>


                            <!-- 2 - Tableau incidents -->
                            <div class="page" id="p2">
                                <li class="search-box">
                                     <form method="GET" action="#">
                                         <input type="text" name="search_query" placeholder="Rechercher un utilisateur">
                                         <input type="submit" id="validate2" class="bouton2" name="btnInc2" value="rechercher">                                     </form>
                                </li>
                                    <section class="section" id="tableauVisuInc">
                                        <?php
                                            #Fonction #1Incidents : Affichage de l'ensemble des incidents des utilisateurs
                                            view_admin_incidents($username, $connexion);
                                        ?>
                                    </section>
                                    
                                </div>
                                
                            <!-- 3 - Tableau matériels -->
                                <div class="page" id="p3">
                                    <section class="section" id="tableauVisuMat">
                                        <?php
                                            #Fonction #1Materiels : Affichage des matériels de l'entreprise
                                            view_materiels($connexion);
                                        ?>
                                        <a href="#t5"><button class="bouton" id="btnAjoutMat">Ajout d'un matériel</button></a>
                                    </section>
                                    
                                </div>

                            <!-- 4 - Tableau utilisateurs-->
                                <div class="page" id="p4">
                                    <section class="section" id="tableauVisuUser">
                                        <?php
                                            #Fonction #1Utilisateur : Affichage des utilisateurs existants
                                            view_user($connexion);
                                        ?>
                                        <a href="#t6"><button class="bouton" id="btnAjoutUser">Ajout d'un utilisateur</button></a>
                                    </section>
                                    
                                </div>

                            <!-- 5 - Formulaire matériels -->
                                <div class="page" id="p5">
                                    <section class="section grandFormulaire">
                                        <div class="titreFlex">
                                            <h3>Ajout d'un matériel</h3>
                                        </div>
                                            <?php
                                                #Fonction #4Materiels : Créer le formulaire d'ajout de matériel
                                                form_create_materiels($connexion);
                                            ?>
                                    </section>
                                </div>

                            <!-- 6 - Formulaire utilisateurs-->
                                <div class="page" id="p6">
                                    <section class="section formulaire">
                                        <div class="titreFlex">
                                            <h3>Création de compte</h3>
                                        </div>
                                            <?php
                                                #Fonction #4Inscription : Formulaire de l'administrateur pour la création d'un compte (admin ou utilisateur)
                                                form_create_user_admin($connexion);
                                            ?>
                                    </section>
                                </div>


                            </div>
                        </div>
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