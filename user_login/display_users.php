<?php
session_start();
require_once('config.php');

$camp_number = $_POST['camp_number'];
$sql = "SELECT users.id, users.firstname, users.lastname, users.email, users.phonenumber
FROM registrations
INNER JOIN users ON registrations.user_id = users.id
WHERE registrations.camp_id = ?";
$stmtdisplay = $db->prepare($sql);
$result = $stmtdisplay->execute([$camp_number]);

if($result){
    $data = $stmtdisplay->fetchAll(PDO::FETCH_ASSOC);
}

header('Content-Type: application/json');
echo json_encode($data);
?>