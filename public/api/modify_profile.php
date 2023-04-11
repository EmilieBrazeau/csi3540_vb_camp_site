<?php 
require_once('../../config/config.php');
?>

<?php
if(isset($_POST)){
    $id             = $_POST['id'];
    $firstname      = $_POST['firstname'];
    $lastname       = $_POST['lastname'];
    $email          = $_POST['email'];
    $phonenumber    = $_POST['phonenumber'];
    $password       = $_POST['password'];

    $sql = "UPDATE users SET firstname=?, lastname=?, email=?, phonenumber=?, password=? WHERE id=?";
    $stmtreplace = $db->prepare($sql);
    $result = $stmtreplace->execute([$firstname, $lastname, $email, $phonenumber, $password, $id]);
    
    if ($result) {
        $sql2 = "SELECT * FROM users WHERE id = ? LIMIT 1";
        $stmtselect = $db->prepare($sql2);
        $result2 = $stmtselect->execute([$id]);
        $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
        if($stmtselect->rowCount() > 0){
            $_SESSION['userlogin'] = $user;
        }
        $response_array['status'] = 'success';
        $response_array['message'] = 'Les données ont été mises à jour!';
    } else {
        $response_array['status'] = 'error';
        $response_array['message'] = 'Un erreur a eu lieu lors de la sauvegarde.';
    }
    echo json_encode($result);
}
?>
