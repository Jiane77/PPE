<?php
session_start();

// ===== Vérifier la session =====
if(!isset($_SESSION['email']) || $_SESSION['role'] != "candidat"){
    header("Location:connexion.php"); // Retour vers login si non connecté
    exit;
}

// Inclure le contrôleur pour récupérer les données
require_once("../../../controleur/controleur.class.php");
$unControleur = new Controleur();

// Exemple : récupérer les infos du candidat
$candidat = $unControleur->selectWhere("candidat", "idcandidat", $_SESSION['idutilisateur']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Dashboard Candidat</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans">

    <!-- Header -->
    <header class="bg-blue-600 text-white shadow-md">
        <div class="container mx-auto flex justify-between items-center p-4">
            <h1 class="text-2xl font-bold">Dashboard Candidat</h1>
            <nav class="space-x-4">
                <a href="dashboard.php" class="hover:bg-blue-700 px-3 py-2 rounded transition">Dashboard</a>
                <a href="quiz.php" class="hover:bg-blue-700 px-3 py-2 rounded transition">Quiz</a>
                <a href="planning.php" class="hover:bg-blue-700 px-3 py-2 rounded transition">Planning</a>
                <a href="deconnexion.php" class="hover:bg-red-600 px-3 py-2 rounded transition bg-red-500">Déconnexion</a>
            </nav>
        </div>
    </header>

    <!-- Main content -->
    <main class="container mx-auto mt-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Welcome Card -->
            <div class="bg-white shadow-lg rounded-xl p-6 flex flex-col justify-center items-center">
                <h2 class="text-xl font-semibold mb-2">Bienvenue, <?php echo $_SESSION['nom']; ?> !</h2>
                <p class="text-gray-600">Voici vos informations personnelles :</p>
            </div>

            <!-- Profile Info Card -->
            <div class="bg-white shadow-lg rounded-xl p-6">
                <h3 class="text-lg font-semibold mb-4">Informations du Candidat</h3>
                <div class="space-y-3 text-gray-700">
                    <p><span class="font-medium">Nom :</span> <?php echo $candidat['nom']; ?></p>
                    <p><span class="font-medium">Prénom :</span> <?php echo $candidat['prenom']; ?></p>
                    <p><span class="font-medium">Email :</span> <?php echo $candidat['email']; ?></p>
                    <p><span class="font-medium">Téléphone :</span> <?php echo $candidat['tel']; ?></p>
                    <p><span class="font-medium">Adresse :</span> <?php echo $candidat['adresse']; ?></p>
                </div>
            </div>
        </div>
    </main>

</body>
</html>
