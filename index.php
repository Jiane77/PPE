<?php
session_start();
require_once("controleur/controleur.class.php");
$unControleur = new Controleur();

// Récupération du rôle et du nom si connecté
$role = $_SESSION['role'] ?? null;
$nom  = $_SESSION['nom'] ?? '';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>AutoDrive — Accueil</title>
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
        <?php
        if ($role === 'admin') {
            echo '<li class="nav-item"><a class="nav-link" href="index.php?page=1">Candidats</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="index.php?page=2">Moniteurs</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="index.php?page=3">Véhicules</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="index.php?page=4">Cours</a></li>';
        } elseif ($role === 'moniteur') {
            echo '<li class="nav-item"><a class="nav-link" href="index.php?page=4">Mes Cours</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="index.php?page=3">Mes Véhicules</a></li>';
        } elseif ($role === 'candidat') {
            echo '<li class="nav-item"><a class="nav-link" href="index.php?page=4">Mes Cours</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="index.php?page=1">Mon Profil</a></li>';
        } else {
            // Menu visiteurs
            echo '<li class="nav-item"><a class="nav-link" href="#home">Accueil</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="#services">Services</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>';
        }
        ?>
      </ul>

      <!-- DROITE -->
      <div class="d-flex gap-2 align-items-center">
        <?php if ($role): ?>
            <span class="nav-link text-dark">Bonjour, <?= htmlspecialchars($nom) ?></span>
            <a href="deconnexion.php" class="nav-link btn-connect">Déconnexion</a>
        <?php else: ?>
            <a href="connexion.php" class="nav-link btn-connect">Se connecter</a>
            <a href="inscription.php" class="nav-link btn-signup">S'inscrire</a>
        <?php endif; ?>
      </div>

    </div>
  </div>
</nav>

<!-- MAIN -->
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
    include("controleur/home.php"); // Page d'accueil commune
}
?>
</main>

<!-- FOOTER -->
<footer class="bg-gray-800 text-white text-center py-4 w-full mt-6">
  &copy; <?= date('Y') ?> AutoDrive. Tous droits réservés.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>