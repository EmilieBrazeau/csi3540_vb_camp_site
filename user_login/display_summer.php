<?php
require_once('config.php');

session_start();

$user_id = $_POST['id'];

$sql = "SELECT camps.id, camps.location, camps.start_date, camps.end_date, 
(camps.max_participants - COUNT(registrations.user_id)) AS places_left, 
camps.age, camps.price FROM camps 
INNER JOIN registrations ON camps.id = registrations.camp_id 
WHERE registrations.user_id = ? 
GROUP BY camps.id 
ORDER BY camps.id ASC";
$stmt = $db->prepare($sql);
$result = $stmt->execute([$user_id]);

if($result){
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Return data in JSON format
header('Content-Type: application/json');
echo json_encode($data);
?>
