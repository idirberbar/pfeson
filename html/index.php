<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IGII</title>
  <link rel="shortcut icon" href="..\IGII\html\Resources\HeadLogo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
  body {
    background: linear-gradient(to bottom, #FAF2EA, #FAF2EA); /* Dégradé de violet à bleu */
    color: #D6955B; /* Texte blanc pour contraste */
  }

  .container {
    background-color: rgba(255, 255, 255, 0.8); /* Conteneurs avec fond légèrement transparent */
    border-radius: 8px; /* Bords arrondis pour les conteneurs */
    padding: 20px; /* Espacement intérieur */
    margin-top: 20px; /* Marge en haut pour chaque conteneur */
  }

  a, a:visited, a:hover {
    color: #D6955B; /* Liens en blanc */
    text-decoration: none; /* Pas de soulignement */
  }

  a.idir {
    color: #007bff; /* Couleur par défaut de Bootstrap pour les liens */
  }

  .btn-outline-primary {
    border-color: #ffffff; /* Bordure blanche pour le bouton */
  }
</style>


</head>

<body>
  <div class="container">
    <div class="auth-buttons text-end pe-3 pt-3">
      <button class="btn btn-outline-primary" type="button" id="loginButton"><a class="idir" href="test.php">Identification</a></button>
     
      
    </div>

    <div class="container">
      <div class="row">
        <div class="col-lg">
          <h1 class="text-center display-4 fw-normal text-body-emphasis">Bienvenue a sonatrach

</h1>
              
        </div>
      </div>
      
      <div class="container">
        <div class="row">
          <div class="col-lg">
            <img class="Imagen" src="Resources\PaginaPrincipal.jpg" alt="Imagen" width="100%" height="100%">
          </div>
        </div>
      </div>
      <div class="container text-center">
        <hr width="me-lg-auto">
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg">
            <h2 id="DescripcionId" class="display-4 fw-normal text-body-emphasis text-center">Description Générale</h2>
            <p id="Descripcion">BuilDoc est la solution dont votre entreprise a besoin pour simplifier la gestion des
              fichiers,
              tâches, incidents et inspections. Découvrez comment cette application peut transformer votre manière de
              travailler
              et comment vous pouvez accomplir plus avec moins d'efforts. BuilDoc est une application web innovante
              conçue pour fournir
              une solution de gestion globale pour votre entreprise. Cet outil puissant est conçu pour simplifier et
              optimiser
              la gestion des fichiers, des tâches, des incidents et des inspections, vous permettant d'améliorer
              l'efficacité et la productivité
              dans tous les aspects de votre organisation.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="container text-center">
      <hr width="me-lg-auto">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg">
          <h2 id="FuncionesId" class="display-4 fw-normal text-body-emphasis text-center">Fonctions</h2>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-lg-4 text-center">
            <h2 id="Titulos">Gestion des Fichiers</h2>
            <p>Dans l'application BuilDoc, vous pouvez organiser, télécharger, renommer, déplacer et partager des
              fichiers. Vous pouvez également créer des dossiers, des projets et attribuer des clients. Cela améliore
              la gestion des documents et des projets,
              stimulant la productivité.</p>
            <img class="align-items-center" src="Resources\GA.png" alt="" width="50%" height="50%">
          </div>
          <div class="col-lg-4 text-center">
            <h2 class="text-center">Gestion des Tâches</h2>
            <p>Le module de tâches de BuilDoc permet de gérer les phases, de créer, modifier, supprimer, attribuer,
              approuver,
              commenter et joindre des fichiers aux tâches. Il facilite la collaboration et améliore l'efficacité dans
              le suivi
              de la progression du projet.</p>
            <img class="align-items-center" src="Resources\GT.png" alt="" width="50%" height="50%">
          </div>
          <div class="col-lg-4 text-center">
            <h2 class="text-center">Gestion de la Qualité</h2>
            <p>La gestion des incidents et des inspections dans BUILDOC est essentielle dans la construction. Enregistrez
              les incidents,
              programmez des inspections et améliorez la qualité et la sécurité. Les rapports facilitent les décisions
              et l'amélioration continue
              dans l'industrie.</p>
            <img class="align-items-center" src="Resources\GC.png" alt="" width="50%" height="50%">
          </div>
        </div>
      </div>
    </div>
    <div class="container text-center">
      <hr width="me-lg-auto">
    </div>

   
      
      </main>
    </div>

    <div class="container text-center">
      <hr width="me-lg-auto">
    </div>

    <div class="row">
      <div class="col-lg">
        <h1 id="ClientesId" class="display-4 fw-normal text-body-emphasis text-center">Clients</h1>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-lg">
          <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="Resources\Carrusel2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Constructora Bolivar</h5>
                  <p>Constructora Bolivar est une entreprise leader dans la construction de logements et
                    d'urbanisations en Colombie.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="Resources\Carrusel.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Grupo Argos</h5>
                  <p>Grupo Argos est une entreprise diversifiée opérant dans l'industrie du ciment et de
                    l'infrastructure en Colombie.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="Resources\Carrusel3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Triada S.A.</h5>
                  <p>Triada S.A. est une entreprise spécialisée dans les projets de logements et de bâtiments
                    commerciaux en Colombie.</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
              data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>


  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>


</body>

</html>
