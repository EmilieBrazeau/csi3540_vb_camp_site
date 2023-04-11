<?php
require_once('../../config/config.php');

session_start();

$user_id = $_POST['id'];

$sql = "SELECT t.id, t.location, t.start_date, t.end_date, t.places_left, t.min_age, t.price 
        FROM (
            SELECT 
                camps.id, 
                camps.location, 
                camps.start_date, 
                camps.end_date, 
                (camps.max_participants - COUNT(registrations.user_id)) AS places_left, 
                camps.min_age, 
                camps.price 
            FROM camps 
            INNER JOIN registrations ON camps.id = registrations.camp_id 
            GROUP BY camps.id 
            ORDER BY camps.id ASC
        ) t
        INNER JOIN registrations r ON t.id = r.camp_id
        WHERE r.user_id = ?
        ORDER BY t.id ASC";
$stmt = $db->prepare($sql);
$result = $stmt->execute([$user_id]);

if($result){
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Return data in JSON format
header('Content-Type: application/json');
echo json_encode($data);
?>
