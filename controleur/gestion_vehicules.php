<h3 class="text-center mt-4">Gestion des Véhicules</h3>

<?php
// INSERT
if (isset($_POST['Valider'])) {
    $t = [
        ':marque'          => $_POST['marque'],
        ':modele'          => $_POST['modele'],
        ':annee'           => $_POST['annee'],
        ':categorie'       => $_POST['categorie'],
        ':immatriculation' => $_POST['immatriculation']
    ];
    $unControleur->insertVehicule($t);
}

// UPDATE
if (isset($_POST['Modifier'])) {
    $t = [
        ':idvehicule'      => $_POST['idvehicule'],
        ':marque'          => $_POST['marque'],
        ':modele'          => $_POST['modele'],
        ':annee'           => $_POST['annee'],
        ':categorie'       => $_POST['categorie'],
        ':immatriculation' => $_POST['immatriculation']
    ];
    $unControleur->updateVehicule($t);
}

// DELETE / EDIT
if (isset($_GET['action']) && isset($_GET['idvehicule'])) {
    $action = $_GET['action'];
    $idvehicule = $_GET['idvehicule'];
    switch ($action) {
        case "sup":
            $unControleur->deleteVehicule($idvehicule);
            break;
        case "edit":
            $leVehicule = $unControleur->selectWhere("vehicule", "idvehicule", $idvehicule);
            break;
    }
}

// FILTRE
if (isset($_GET['filtre']) && $_GET['filtre'] != "") {
    $mot = $_GET['filtre'];
    $lesVehicules = $unControleur->selectAllVehiculesFiltre($mot);
} else {
    $lesVehicules = $unControleur->selectAllVehicules();
}

require_once("vue/vue_insert_vehicule.php");
?>

<?php require_once("vue/vue_select_vehicules.php"); ?>
