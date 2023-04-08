<?php
session_start();
require_once('config.php');

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1";
$stmtselect = $db->prepare($sql);
$result = $stmtselect->execute([$username, $password]);

if($result){
    $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
    if($stmtselect->rowCount() > 0){
        $_SESSION['userlogin'] = $user;
        echo '1';
    }else{
        echo 'There was no user match.';
    }
}else{
    echo "There were errors while connecting to database";
}