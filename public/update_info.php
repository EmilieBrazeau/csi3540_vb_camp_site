<?php
    session_start();
    if(!isset($_SESSION['userlogin'])){
        header("Location: login.php");
    }

    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION);
        header("Location: login.php");
    }

    // Store the user ID in the session variable
    $user_id = $_SESSION['userlogin']['id'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration | PHP</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles_login.css">
</head>
<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="registration_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="img/volleyball_logo_camp.png" class="brand_logo" alt="Beach Volleyball Camp">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form action="api/modify_profile.php" method="post">
                        <h1>Modification</h1>
                        <p>Veuillez remplir tous les champs.</p>
                        <hr class="mb-3">

                        <label for="firstname"><b>Prénom</b></label>
                        <div class="input-group mb-3">
                            <input class="form-control input" id="firstname" type="text" name="firstname" value="<?php echo $_SESSION['userlogin']['firstname'] ?? ""?>" required>
                        </div>

                        <label for="lastname"><b>Nom</b></label>
                        <div class="input-group mb-3">
                            <input class="form-control input" id="lastname" type="text" name="lastname" value="<?php echo $_SESSION['userlogin']['lastname'] ?? ""?>"required>
                        </div>

                        <label for="email"><b>Adresse courriel</b></label>
                        <div class="input-group mb-3">
                            <input class="form-control input" id="email" type="email" name="email" value="<?php echo $_SESSION['userlogin']['email'] ?? ""?>"required>
                        </div>

                        <label for="phonenumber"><b>Numéro de téléphone</b></label>
                        <div class="input-group mb-3">
                            <input class="form-control input" id="phonenumber" type="text" name="phonenumber" value="<?php echo $_SESSION['userlogin']['phonenumber'] ?? ""?>"required>
                        </div>

                        <label for="password"><b>Mot de passe</b></label>
                        <div class="input-group mb-3">
                            <input class="form-control input" id="password" type="password" name="password" value="<?php echo $_SESSION['userlogin']['password'] ?? ""?>" required>
                        </div>
                        
                        <hr class="mb-3">

                        <div class="d-flex justify-content-center mt-3 register_container">
                            <button class="btn register_btn" type="button" id="modify" name="create" value="Mettre à jour">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(function(){
            $('#modify').click(function(e){

                let valid = this.form.checkValidity();
                if(valid){
                    let firstname   = $('#firstname').val();
                    let lastname    = $('#lastname').val();
                    let email       = $('#email').val();
                    let phonenumber = $('#phonenumber').val();
                    let password    = $('#password').val();

                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: 'api/modify_profile.php',
                        dataType: "json",
                        data: {id: <?php echo $user_id?>, firstname: firstname, lastname: lastname, email: email, phonenumber: phonenumber, password: password},
                        success: function(data){
                            Swal.fire({
                                'title': 'Les données ont été mises à jour!',
                                'text': "Appuyez sur 'OK' pour retourner à la page d'accueil.",
                                'type': 'success'
                            }).then(function(){
                                window.location.href = "index.php";
                            });
                        },
                        error: function(data){
                            Swal.fire({
                                'title': 'Erreur',
                                'text': 'Un erreur a eu lieu lors de la sauvegarde.',
                                'type': 'error'
                            })
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
