<!DOCTYPE html>
<html>
<head>
    <title>User Registration | PHP</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">
</head>
<body>
    <div>
        <?php
        if(isset($_POST['create'])){
            $firstname      = $_POST['firstName'];
            $lastname       = $_POST['lastName'];
            $email          = $_POST['email'];
            $phoneNumber    = $_POST['phoneNumber'];
            $password       = $_POST['password'];

            echo $firstname." ".$lastname." ".$email." ".$phoneNumber." ".$password;
        }   
        ?>
    </div>
    <div>
        <form action="registration.php" method="post">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <h1>Registration</h1>
                        <p>Fill up the form with correct values.</p>
                        <hr class="mb3">
                        <label for="firstName"><b>First Name</b></label>
                        <input class="form-control" type="text" name="firstName" required>

                        <label for="lastName"><b>Last Name</b></label>
                        <input class="form-control" type="text" name="lastName" required>

                        <label for="email"><b>Email address</b></label>
                        <input class="form-control" type="email" name="email" required>

                        <label for="phoneNumber"><b>Phone number</b></label>
                        <input class="form-control" type="text" name="phoneNumber" required>

                        <label for="password"><b>Password</b></label>
                        <input class="form-control" type="password" name="password" required>
                        <hr class="mb3">
                        <input class="btn btn-primary" type="submit" name="create" value="Sign up">
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>
</html>