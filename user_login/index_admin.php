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
            <a class="navbar-brand" href="index_admin.php">École de volleyball de plage de l'Outaouais</a>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index_admin.php">Accueil<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="not_completed_admin.php">À propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="not_completed_admin.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-text" href="index_admin.php">Connectée en tant que: <?php echo $_SESSION['userlogin']['username']; ?></a>
                </li>
                </ul>
            </div>

            <ul class="navbar-nav ml-auto">
                
                <li class="nav-item">
                <a href="logout.php?logout=true" class="btn login_btn nav-btn">Déconnexion</a>
                </li>
            </ul>
        </nav>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div id="table-container">    
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $.ajax({
            type: "POST",
            url: "api/get_camp_count.php",
            dataType: "json",
            success: function(response) {
                let count = response.length;
                console.log("count: "+response.length);
                
                for (let i = 0; i < count; i++) {
                    console.log("id: "+response[i].id);
                    // generate table for camp i
                    let table = "<div class='table-responsive'><h1 style='padding-left: 15px;'><u>Participants au camp #" + (i+1) + "</u></h1><table id='user-table-" + (i+1) + "' class='table table-striped'><thead><tr><th>ID</th><th>Prénom</th><th>Nom</th><th>Date de naissance</th><th>Email</th><th>Numéro de téléphone</th></tr></thead><tbody></tbody></table></div><div></div></br></br></br>";
                    $("#table-container").append(table);
                    // populate table for camp i with data
                    $.ajax({
                        type: "POST",
                        url: "api/display_users.php",
                        dataType: "json",
                        data: {camp_number: response[i].id},
                        success: function(response2) {
                            let table = "<table>";
                            for (let j = 0; j < response2.length; j++) {
                                table += "<tr>";
                                table += "<td>" + response2[j].id + "</td>";
                                table += "<td>" + response2[j].firstname + "</td>";
                                table += "<td>" + response2[j].lastname + "</td>";
                                table += "<td>" + response2[j].date_of_birth + "</td>";
                                table += "<td>" + response2[j].email + "</td>";
                                table += "<td>" + response2[j].phonenumber + "</td>";
                                table += "</tr>";
                            }
                            table += "</table>";
                            console.log("#user-table-" + (i+1) + " tbody");
                            $("#user-table-" + (i+1) + " tbody").html(table);
                            
                        }
                    });
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    </script>
</body>
</html>
