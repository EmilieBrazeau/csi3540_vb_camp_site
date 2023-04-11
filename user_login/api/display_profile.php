<?php
require_once('config.php');

session_start();

$user_id = $_POST['id'];

$sql = "SELECT id,firstname,lastname,date_of_birth,email,phonenumber FROM users WHERE id = ?";
$stmt = $db->prepare($sql);
$result = $stmt->execute([$user_id]);

if($result){
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    $user = null;
}

// Return data in JSON format
header('Content-Type: application/json');
echo json_encode($user);
?>
