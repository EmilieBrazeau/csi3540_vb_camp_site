<?php
require_once('config.php');

$sql = "SELECT 
            camps.id, 
            camps.location, 
            camps.start_date, 
            camps.end_date, 
            (camps.max_participants - COUNT(registrations.user_id)) AS places_left, 
            camps.min_age, 
            camps.price 
            FROM camps 
            LEFT JOIN registrations ON camps.id = registrations.camp_id 
            GROUP BY camps.id 
            ORDER BY camps.id ASC";
$stmtdisplay = $db->prepare($sql);
$result = $stmtdisplay->execute();

if($result){
    $data = $stmtdisplay->fetchAll(PDO::FETCH_ASSOC);
}

// Return data in JSON format
header('Content-Type: application/json');
echo json_encode($data);
?>
