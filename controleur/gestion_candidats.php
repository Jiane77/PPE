<h3 class="text-center mt-4">Gestion des Candidats</h3>

<?php
// INSERT
if (isset($_POST['Valider'])) {
    $t = [
        ':nom'     => $_POST['nom'],
        ':prenom'  => $_POST['prenom'],
        ':email'   => $_POST['email'],
        ':tel'     => $_POST['tel'],
        ':adresse' => $_POST['adresse']
    ];
    $unControleur->insertCandidat($t);
}

// UPDATE
if (isset($_POST['Modifier'])) {
    $t = [
        ':idcandidat' => $_POST['idcandidat'],
        ':nom'        => $_POST['nom'],
        ':prenom'     => $_POST['prenom'],
        ':email'      => $_POST['email'],
        ':tel'        => $_POST['tel'],
        ':adresse'    => $_POST['adresse']
    ];
    $unControleur->updateCandidat($t);
}

// DELETE / EDIT
if (isset($_GET['action']) && isset($_GET['idcandidat'])) {
    $action = $_GET['action'];
    $idcandidat = $_GET['idcandidat'];
    switch ($action) {
        case "sup":
            $unControleur->deleteCandidat($idcandidat);
            break;
        case "edit":
            $leCandidat = $unControleur->selectWhere("candidat", "idcandidat", $idcandidat);
            break;
    }
}

// FILTRE
if (isset($_GET['filtre']) && $_GET['filtre'] != "") {
    $mot = $_GET['filtre'];
    $lesCandidats = $unControleur->selectAllCandidatsFiltre($mot);
} else {
    $lesCandidats = $unControleur->selectAllCandidats();
}

require_once("vue/admin/vue_insert_candidat.php");
?>

<?php require_once("vue/admin/vue_select_candidats.php"); ?>