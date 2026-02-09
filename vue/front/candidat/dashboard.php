<?php
session_start();

if(!isset($_SESSION['email']) || $_SESSION['role'] != "candidat"){
    header("Location:../../../connexion.php");
    exit;
}

require_once("../../../controleur/controleur.class.php");
$unControleur = new Controleur();

$candidat = $unControleur->selectWhere(
    "candidat",
    "idcandidat",
    $_SESSION['idutilisateur']
);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Dashboard Candidat</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../../../css/style.css?v=<?php echo time(); ?>">

</head>

<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container-fluid">

    <a class="navbar-brand d-flex align-items-center" href="dashboard.php">
      <img src="../../../images/logo.png" alt="Logo" width="43" height="40" class="me-3">
      <span>Auto-École</span>
    </a>

    <div class="navbar-nav">
      <a class="nav-link active" href="dashboard.php">Dashboard</a>
      <a class="nav-link" href="quiz.php">Quiz</a>
      <a class="nav-link" href="planning.php">Planning</a>

      <a class="nav-link text-warning fw-semibold" href="../../../deconnexion.php">
        Déconnexion
      </a>
    </div>

  </div>
</nav>

<!-- ===== MAIN ===== -->
<main class="container mt-6 w-50">

  <div class="row"> <!-- ligne principale avec écart entre les colonnes -->

    <!-- Carte image à gauche -->
    <div class="col-md-6">
      <div class="card shadow-sm border-0 rounded-4 h-100">
        <div class="card-body text-center d-flex flex-column justify-content-center">
          <h4 class="fw-bold mb-4">Bienvenue</h4>
          <p class="text-muted mb-3">
            <?php echo $_SESSION['nom']; ?>
          </p> 
          
          <img src="flyer.jpeg" class="flex justify-content-center align-items-center w-100 h-75">
          
        </div>
      </div>
    </div>

    <!-- Carte infos personnelles à droite -->
    <div class="col-md-6 mb-5 w-50">
      <div class="card shadow-sm border-0 rounded-4 h-100">
        <div class="card-body">
          <h5 class="fw-semibold  mt-6  text-center">Mes informations personnelles</h5>

          <p><strong>Nom :</strong> <?php echo $candidat['nom']; ?></p>
          <p><strong>Prénom :</strong> <?php echo $candidat['prenom']; ?></p>
          <p><strong>Email :</strong> <?php echo $candidat['email']; ?></p>
          <p><strong>Téléphone :</strong> <?php echo $candidat['tel']; ?></p>
          <p><strong>Adresse :</strong> <?php echo $candidat['adresse']; ?></p>

        </div>
      </div>
    </div>

  </div>
</main>

<div class="mb-5">

</div>
<!-- ===== FOOTER ===== -->
 <footer class="bg-gray-800 text-white text-center py-4 w-full mt-6">
    &copy; 2026 Auto-École. Tous droits réservés.
</footer>

</body>
</html>
