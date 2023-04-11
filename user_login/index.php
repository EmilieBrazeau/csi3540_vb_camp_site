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
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <div class="d-flex">
        <img src="img/volleyball_logo_camp.png" width="150" height="150" class="d-inline-block align-top" alt="">
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
            <a class="navbar-brand" href="index.php">École de volleyball de plage de l'Outaouais</a>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="not_completed.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-text" href="index.php">Logged in as: <?php echo $_SESSION['userlogin']['firstname']." ".$_SESSION['userlogin']['lastname']; ?></a>
                </li>
                </ul>
            </div>

            <ul class="navbar-nav ml-auto">
                
                <li class="nav-item">
                <a href="logout.php?logout=true" class="btn login_btn nav-btn">Logout</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="table-responsive">
        <h1 style="padding-left: 15px;"><u>Mon été</u></h1>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $.ajax({
                type: "POST",
                url: "display_profile.php",
                dataType: "json",
                data: {id: <?php echo $user_id?>},
                success: function(response) {
                    console.log(response);
                    let table = "<table><tr><td>"
                     + response.id + "</td><td>" 
                     + response.firstname + "</td><td>" 
                     + response.lastname + "</td><td>" 
                     + response.email + "</td><td>" 
                     + response.phonenumber + "</td></tr></table>";
                    //console.log(table);
                    $("#user-table tbody").html(table);
                }
            });
        </script>
    </div>

    <div class="table-responsive">
        <h1 style="padding-left: 15px;"><u>Mon profil</u></h1>
        <table id="user-table" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $.ajax({
                type: "POST",
                url: "display_profile.php",
                dataType: "json",
                data: {id: <?php echo $user_id?>},
                success: function(response) {
                    console.log(response);
                    let table = "<table><tr><td>"
                     + response.id + "</td><td>" 
                     + response.firstname + "</td><td>" 
                     + response.lastname + "</td><td>" 
                     + response.email + "</td><td>" 
                     + response.phonenumber + "</td></tr></table>";
                    //console.log(table);
                    $("#user-table tbody").html(table);
                }
            });
        </script>
    </div>
</body>
</html>
