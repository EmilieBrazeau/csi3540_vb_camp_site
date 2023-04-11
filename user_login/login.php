<?php
    session_start();
    if(isset($_SESSION['userlogin'])){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>User Login</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="img/volleyball_logo_camp.png" class="brand_logo" alt="Beach Volleyball Camp">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form>
                        <label for="username"><b>Nom d'utilisateur (email)</b></label>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="username" id="username" class="form-control input_user" required>
                        </div>
                        <label for="password"><b>Mot de passe</b></label>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control input_pass" required>
                        </div>
                    
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="button" name="button" id="login" class="btn login_btn">Connexion</button>
                        </div>
                    </form>
                </div>
                <div class="mt-4">
                    <div class="d-flex justify-content-center links"><b>Pas encore de compte?</b></div>
                    <div class="d-flex justify-content-center links"><a href="../user_account/registration.php" class="ml-2"><b>Inscris-toi!</b></a></div>
                </div>
                    <!-- <div class="d-flex justify-content-center">
                        <a href="registration.php">Forgot password?</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
            crossorigin="anonymous"></script>
        
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script>
        $(function(){
            $('#login').click(function(e){
                let valid = this.form.checkValidity();

                if(valid){
                    let username = $('#username').val();
                    let password = $('#password').val();

                    e.preventDefault();

                    $.ajax({
                        type:'POST',
                        url: 'api/jslogin.php',
                        data: {username: username, password: password},
                        success: function(data){
                            if($.trim(data) === "1"){
                                window.location.href = "index.php";
                            }
                            else if($.trim(data) === "2"){
                                window.location.href = "index_admin.php";
                            }
                        },
                        error: function(data){
                            alert('There were errors while doing the operation.');
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>