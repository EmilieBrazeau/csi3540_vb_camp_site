<?php
require_once('../../config/config.php');
session_start();

$sql="SELECT id FROM camps";
$stmt = $db->prepare($sql);
$result = $stmt->execute();

if($result){
    $ids = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

header('Content-Type: application/json');
echo json_encode($ids);
?>
