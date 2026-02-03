<?php
session_start();
require_once("controleur/controleur.class.php");
$unControleur = new Controleur();

$message = "";

if (isset($_POST['SeConnecter'])) {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    $unUser = $unControleur->verifConnexion($email, $mdp);

    if ($unUser != null) {
        $_SESSION['email'] = $unUser['email'];
        $_SESSION['nom'] = $unUser['nom'];
        $_SESSION['idutilisateur'] = $unUser['idutilisateur'];
        header("Location: index.php");
        exit;
    } else {
        $message = "<div class='bg-red-100 text-red-700 px-4 py-2 rounded mb-3 text-center'>Email ou mot de passe incorrect</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Connexion - Auto-École</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br #add8e6 to-indigo-600 relative">

  <!-- Fond flou décoratif -->
  <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('background.jpg');"></div>

  <!-- Card glassmorphism -->
  <div class="relative bg-white/30 backdrop-blur-md shadow-2xl rounded-3xl p-10 w-full max-w-md text-gray-800">
    
    <!-- Logo -->
    <div class="flex justify-center">
      <img src="https://www.viteunsite.com/images-defaut/galerie/logo-auto-ecole-silhouette-voiture-d90d2b-2b2d42-512x168.png" alt="Logo Auto-École" class="w-50">
    </div>

    <h3 class="text-3xl font-bold text-center mb-6">Bienvenue</h3>

    <?php echo $message; ?>

    <form method="post" class="space-y-5">
      <div>
        <label class="block mb-1 font-medium">Email</label>
        <input type="email" name="email" placeholder="Email" required
               class="w-full px-4 py-3 rounded-xl border border-white/50 bg-white/70 placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent transition" />
      </div>

      <div>
        <label class="block mb-1 font-medium">Mot de passe</label>
        <input type="password" name="mdp" placeholder="Mot de passe" required
               class="w-full px-4 py-3 rounded-xl border border-white/50 bg-white/70 placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent transition" />
      </div>

      <button type="submit" name="SeConnecter"
              class="w-full py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-lg shadow-lg transition">Se connecter</button>
    </form>

    <p class="mt-6 text-center text-white/80 text-sm">
      Pas de compte ? <a href="inscription.php" class="text-white font-semibold hover:underline">Inscrivez-vous</a>
    </p>
  </div>

</body>
</html>
