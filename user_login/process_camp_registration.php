
<?php
session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['userlogin']['id'];
    $camp_id = $_POST['camp_id'];

    // Check if the user is already registered for the camp
    $sql = "SELECT * FROM registrations WHERE camp_id=? AND user_id=?";
    $stmtselect = $db->prepare($sql);
    $stmtselect->execute([$camp_id, $user_id]);
    $registration = $stmtselect->fetch(PDO::FETCH_ASSOC);
    if ($registration) {
        // User is already registered for the camp
        echo "Vous êtes déjà inscrit au camp #".$camp_id;
    } else {
        // User is not registered for the camp, insert new registration record
        $sql = "INSERT INTO registrations (camp_id, user_id) VALUES (?, ?)";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$camp_id, $user_id]);
        if ($result) {
            echo "Inscription confirmée pour le camp #".$camp_id;
        }
    }
}
?>
