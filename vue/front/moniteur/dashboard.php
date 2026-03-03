<?php
session_start();
require_once("../../../controleur/controleur.class.php");
$unControleur = new Controleur();

// Vérifie que l'utilisateur est connecté et est moniteur
if (!isset($_SESSION['idutilisateur']) || $_SESSION['role'] !== 'moniteur') {
    header("Location: ../../../connexion.php");
    exit;
}

// Récupère les infos du moniteur depuis la table "utilisateur"
$moniteur = $unControleur->selectWhere("utilisateur", "idutilisateur", $_SESSION['idutilisateur']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Dashboard Moniteur</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../../../css/style.css?v=<?php echo time(); ?>">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="dashboard.php">
      <img src="../../../images/logo.png" alt="Logo" width="43" height="40" class="me-3">
      <span>Auto-École</span>
    </a>
    <div class="navbar-nav">
      <a class="nav-link active" href="dashboard.php">Dashboard</a>
      <a class="nav-link" href="">Planning</a>
      <a href="../../../deconnexion.php" class="nav-link text-warning fw-semibold">Déconnexion</a>
    </div>
  </div>
</nav>

<!-- MAIN -->
<main class="container mt-5">
  <div class="row">

    <!-- Carte image -->
   <div class="col-md-6 mb-4">
  <div class="card shadow-sm border-0 rounded-4 h-100">
    <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
      <h4 class="fw-bold mb-3">Bienvenue</h4>
      <strong class="text-muted mb-3"><?php echo htmlspecialchars($_SESSION['nom'] ?? $moniteur['nom']); ?></strong>
      <img src="flyer.jpeg" class="img-fluid rounded w-50" alt="Flyer">
    </div>
  </div>
</div>
    <!-- Carte infos personnelles -->
    <div class="col-md-6 mb-4">
      <div class="card shadow-sm border-0 rounded-4 h-100">
        <div class="card-body">
          <h5 class="fw-semibold text-center mb-4">Mes informations personnelles</h5>

          <?php if ($moniteur): ?>
            <div class="d-flex flex-column align-items-start mt-5">
          <div class="d-flex flex-column gap-2">
            <p><strong>Nom :</strong> <?php echo htmlspecialchars($moniteur['nom']); ?></p>
            <p><strong>Prénom :</strong> <?php echo htmlspecialchars($moniteur['prenom'] ?? 'Non renseigné'); ?></p>
            <p><strong>Email :</strong> <?php echo htmlspecialchars($moniteur['email']); ?></p>
            <p><strong>Téléphone :</strong> <?php echo htmlspecialchars($moniteur['tel'] ?? 'Non renseigné'); ?></p>
            <p><strong>Adresse :</strong> <?php echo htmlspecialchars($moniteur['adresse'] ?? 'Non renseignée'); ?></p>
          </div>
            </div>
          <?php else: ?>
          <p class="text-danger">Informations introuvables.</p>
          <?php endif; ?>

        </div>
      </div>
    </div>

  </div>
</main>

<footer class="bg-gray-800 text-white text-center py-4 mt-4">
  &copy; 2026 Auto-École. Tous droits réservés.
</footer>

</body>
</html>