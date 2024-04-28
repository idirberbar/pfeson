<?php
    #Import
        include '../php/fonction.php';

    #Fonction #1Build : Création de l'en-tête jusqu'au header
        build_header();
?>

<!-- Titre de l\'onglet dans le navigateur -->
    <title>IGII</title>

    <body>

        <div class="ct" id="t1">
            <div class="ct" id="t2">
                <div class="ct" id="t3">

                <!-- Menu -->
                    <nav>
                        <ul id="top">
                            <a href="#t1"><li class="icone"><img src="../img/home.png" alt="Accueil"></li></a>
                        </ul>

                        <ul id="middle">
                            <a href="#t2"><li class="lien" id="dos">Inscription</li></a>
                            <a href="#t3"><li class="lien" id="tres">Connexion</li></a>
                        </ul>
                    </nav>


                <!-- 1 - Accueil -->
                    <div class="page" id="p1">
                        <section class="accueil">
                            <img src="../img/computer.png" alt="Icône">
                            <h1>Interface de gestion des incidents informatiques</h1>
                            <h2 class="phraseAccueil">Bienvenue<br>
                                <span id="sousPhraseAccueil">Veuillez vous inscrire ou vous connecter</span>
                            </h2>
                        </section>  
                    </div>


                <!-- 2 - Inscription -->
                    <div class="page" id="p2">
                        <section class="section formulaire">
                            <div class="titreFlex">
                                <h3>Inscription</h3>
                            </div>
                            <form method="post" action="../php/inscription.php">
                                <div class="saisieFlex">
                                    <input type="text" class="saisie" name="nomIns" placeholder="Nom d'utilisateur" autofocus required/>
                                    <div id="adresseMail">
                                        <input type="text" id="preMail" class="saisie" name="email" placeholder="Adresse mail" pattern="[a-z]{3,}[.]{1}[a-z]{3,}" required>
                                        <input type="text"  id="sufMail" class="saisie" value="@Son.dz  " disabled>
                                    </div>
                                    <input type="password" class="saisie" name="mdtIns" placeholder="Mot de passe" required/>
                                    <input type="password" class="saisie" name="mdtIns" placeholder="Verifier votre Mot de passe" required/>
                                </div>
                                <div class="btnFlex">
                                    <input type="submit" class="bouton" name="btnIns" value="Inscription"/>
                                </div>
                            </form>
                        </section>
                    </div>

                    
                <!-- 3 - Connexion-->
                    <div class="page" id="p3">
                        <section class="section formulaire">
                            <div class="titreFlex">
                                <h3>Identification</h3>
                            </div>
                            <form method="post" action="../php/connexion.php">
                                <div class="saisieFlex">
                                    <input type="text" class="saisie" name="nomCon" placeholder="Nom d'utilisateur" autofocus required/>
                                    <input type="password" class="saisie" name="mdtCon" placeholder="Mot de passe" required/>
                                </div>
                                <div class="btnFlex">
                                    <input type="submit" class="bouton" name="btnCon" value="Connexion"/>
                                </div>
                            </form>
                        </section>
                    </div>


                </div>
            </div>
        </div>
    </body>
</html>