<?php
require_once('../config.php');

$sql = "SELECT * FROM users";
$stmtdisplay = $db->prepare($sql);
$result = $stmtdisplay->execute();

if($result){
    $data = $stmtdisplay->fetchAll(PDO::FETCH_ASSOC);
}

// Return data in JSON format
header('Content-Type: application/json');
echo json_encode($data);
?>
