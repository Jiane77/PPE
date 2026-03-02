<?php
session_start();
require_once("controleur/controleur.class.php");
$unControleur = new Controleur();

if (!isset($_SESSION['email'])) {
    header("Location: connexion.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title>Auto-École</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/png" href="./images/logo.png">
  </head>
  <body>
<nav class="navbar navbar-expand-lg">
  <div class="container">

    <!-- LOGO -->
    <a class="navbar-brand" href="index.php">
      AutoDrive<span>.</span>
    </a>

    <!-- BURGER -->
    <button class="navbar-toggler border-0" type="button"
            data-bs-toggle="collapse" data-bs-target="#navMenu">
      <i class="bi bi-list fs-3" style="color:var(--blue)"></i>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">

      <!-- MENU CENTRE -->
      <ul class="navbar-nav mx-auto gap-1">

        <li class="nav-item">
          <a class="nav-link" href="index.php?page=1">Candidats</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php?page=2">Moniteurs</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php?page=3">Véhicules</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php?page=4">Cours</a>
        </li>

      </ul>

      <!-- DROITE -->
      <div class="d-flex gap-2 align-items-center">

        <a href="connexion.php" class="nav-link btn-connect">
          Se connecter
        </a>

        <a href="inscription.php" class="nav-link btn-signup">
          S'inscrire
        </a>

      </div>

    </div>
  </div>
</nav>
  <main>
    <?php
    if (isset($_GET['page'])) {
      switch($_GET['page']){
        case 1: include("controleur/gestion_candidats.php"); break;
        case 2: include("controleur/gestion_moniteurs.php"); break;
        case 3: include("controleur/gestion_vehicules.php"); break;
        case 4: include("controleur/gestion_cours.php"); break;
        default: include("controleur/erreur.php");
      }
    } else {
      include("controleur/home.php");
    }
    ?>
  </main>

 <footer class="bg-gray-800 text-white text-center py-4 w-full mt-6">
    &copy; 2026 Auto-École. Tous droits réservés.
</footer>
  </body>
</html>
