<!DOCTYPE html>
<html>
<head>
    <title>User Registration | PHP</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="registration_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="../user_login/img/volleyball_logo_camp.png" class="brand_logo" alt="Beach Volleyball Camp">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form action="registration.php" method="post">
                        <h1>Enregistrement</h1>
                        <p>Veuillez remplir les informations ci-bas.</p>
                        <hr class="mb-3">

                        <label for="firstname"><b>Prénom</b></label>
                        <div class="input-group mb-3">
                            <input class="form-control input" id="firstname" type="text" name="firstname" required>
                        </div>

                        <label for="lastname"><b>Nom</b></label>
                        <div class="input-group mb-3">
                            <input class="form-control input" id="lastname" type="text" name="lastname" required>
                        </div>

                        <label for="dateofbirth"><b>Date de naissance (AAAA-MM-JJ)</b></label>
                        <div class="input-group mb-3">
                            <input class="form-control input" id="dateofbirth" type="text" name="dateofbirth" required>
                        </div>

                        <label for="email"><b>Email</b></label>
                        <div class="input-group mb-3">
                            <input class="form-control input" id="email" type="email" name="email" required>
                        </div>

                        <label for="phonenumber"><b>Numéro de téléphone</b></label>
                        <div class="input-group mb-3">
                            <input class="form-control input" id="phonenumber" type="text" name="phonenumber" required>
                        </div>

                        <label for="password"><b>Mot de passe</b></label>
                        <div class="input-group mb-3">
                            <input class="form-control input" id="password" type="password" name="password" required>
                        </div>
                        
                        <hr class="mb-3">

                        <div class="d-flex justify-content-center mt-3 register_container">
                            <button class="btn register_btn" type="button" id="register" name="create" value="Sign up">Enregistrement</button>
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
            $('#register').click(function(e){

                let valid = this.form.checkValidity();
                if(valid){
                    let firstname   = $('#firstname').val();
                    let lastname    = $('#lastname').val();
                    let dateofbirth = $('#dateofbirth').val();
                    let email       = $('#email').val();
                    let phonenumber = $('#phonenumber').val();
                    let password    = $('#password').val();

                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: 'process.php',
                        data: {firstname: firstname, lastname: lastname, dateofbirth: dateofbirth, email: email, phonenumber: phonenumber, password: password},
                        success: function(data){
                            Swal.fire({
                                'title': 'Enregistrement réussie!',
                                'text': data,
                                'type': 'success'
                            }).then(function(){
                                if($.trim(data) === "Appuyez sur 'OK' pour vous connecter."){
                                    window.location.href = "../user_login/index.php";
                                }
                            });
                        },
                        error: function(data){
                            Swal.fire({
                                'title': 'Erreur',
                                'text': "Un erreur s'est produite lors de l'enregistrement.",
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
