<?php
require_once("controleur/controleur.class.php");
$unControleur = new Controleur();
function star($required) {
    return $required ? '<span style="color:red">*</span>' : '';
}


if (isset($_POST['Inscrire'])) {
    // On appelle la fonction du contrôleur (qui appellera celle du modèle)
    $res = $unControleur->inscriptionCandidat($_POST);
    if ($res) {
        header("Location: connexion.php?inscription=reussie");
    } else {
        $msg = "Erreur lors de l'inscription.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Inscription - Auto-École</title>
</head>
<body class="bg-gradient-to-br bg-blue-100 to-indigo-700 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-2xl">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-8">Créer votre compte</h2>
        
        <form method="post" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="flex flex-col">
            <label for="nom" class="text text-first">Nom<?= star(true) ?></label>
            <input type="text" name="nom" placeholder="Nom" required class="p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
         </div>
         <div class="flex flex-col">
            <label for="prenom">Prenom<?= star(true) ?></label>
            <input type="text" name="prenom" placeholder="Prénom" required class="p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
         </div>
         <div class="flex flex-col">
            <label for="email">Email<?= star(true) ?></label>
             <input type="email" name="email" placeholder="Email" required class="p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
         </div>
         <div class="flex flex-col">
            <label for="tel">téléphone<?= star(true) ?></label>
            <input type="text" name="tel" placeholder="Téléphone" required class="p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
         </div>
         <div class="flex flex-col">
            <label for="adresse">Adresse<?= star(true) ?></label>
            <input type="text" name="adresse" placeholder="Adresse" required class="p-3 border rounded-lg md:col-span-2 outline-none">
            <label for="password">Mot de passe<?= star(true) ?></label>
            <input type="password" name="mdp" placeholder="Mot de passe" required class="p-3 border rounded-lg md:col-span-2 outline-none">

         </div>
            <button type="submit" name="Inscrire" class="md:col-span-2 bg-blue-600 text-white py-3 rounded-lg font-bold hover:bg-blue-700 transition">
                S'inscrire maintenant
            </button>
        </form>
        
        <p class="text-center mt-6 text-gray-600">
            Déjà inscrit ? <a href="connexion.php" class="text-blue-600 font-bold hover:underline">Connectez-vous</a>
        </p>
    </div>
</body>
</html>