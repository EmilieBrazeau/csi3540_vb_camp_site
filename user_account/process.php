<?php 
require_once('config.php')
?>

<?php
if(isset($_POST)){
    $firstname      = $_POST['firstname'];
    $lastname       = $_POST['lastname'];
    $email          = $_POST['email'];
    $phonenumber    = $_POST['phonenumber'];
    $password       = $_POST['password'];

    $sql = "INSERT INTO users (firstname, lastname, email, phonenumber, password) VALUES (?,?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$firstname, $lastname, $email, $phonenumber, $password]);
    if($result){
        $sql2 = "SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1";
        $stmtselect = $db->prepare($sql2);
        $result2 = $stmtselect->execute([$email, $password]);
        $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
        if($stmtselect->rowCount() > 0){
            $_SESSION['userlogin'] = $user;
        }
        echo "Press OK to log in.";
    }
    else{
        echo 'There were errors while saving the data.';
    }
}else{
    echo 'No data';
}