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
    <title>Camp Registration | PHP</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">
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
                    <a class="nav-link" href="index.php">Accueil<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="not_completed.php">À propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-text" href="index.php">Connecté(e) en tant que: <?php echo $_SESSION['userlogin']['firstname']." ".$_SESSION['userlogin']['lastname']; ?></a>
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
    
    <div class="table-responsive">
        <h1 style="padding-left: 15px;"><u>Camps offerts</u></h1>
        <table id="user-table" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Lieu</th>
                    <th>Date du début</th>
                    <th>Date de fin</th>
                    <th>Places restantes</th>
                    <th>Âge requis</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $.ajax({
                type: "POST",
                url: "display_camps.php",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    let table = "<table>";
                    for (var i = 0; i < response.length; i++) {
                        table += "<tr>";
                        table += "<td>" + response[i].id + "</td>";
                        table += "<td>" + response[i].location + "</td>";
                        table += "<td>" + response[i].start_date + "</td>";
                        table += "<td>" + response[i].end_date + "</td>";
                        table += "<td>" + response[i].places_left + "</td>";
                        table += "<td>" + response[i].min_age + "</td>";
                        table += "<td>" + response[i].price + "</td>";
                        table += "</tr>";
                    }
                    table += "</table>";
                    $("#user-table tbody").html(table);
                }
            });
        </script>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Function to populate the dropdown options
        function populateDropdown() {
            $.ajax({
                type: "POST",
                url: "display_camps.php",
                dataType: "json",
                success: function(data) {
                    // Loop through the data and add each option to the dropdown
                    $.each(data, function(index, value) {
                        $('#camp-select').append($('<option>').text(value.id).attr('value', value.id));
                    });
                }
            });
        }

        // Function to handle the form submission
        function submitForm() {
            var campId = $('#camp-select').val();
            $.ajax({
                type: "POST",
                url: "process_camp_registration.php",
                data: {camp_id: campId},
                success: function(data) {
                    if($.trim(data.slice(0, -1)) === "Vous êtes déjà inscrit au camp #" || $.trim(data) ==="Vous n'êtes pas assez âgé pour vous inscrire à ce camp."){
                        Swal.fire({
                                'title': 'Inscription refusée!',
                                'text': data+". Vous serez redirigé à la page d'accueil.",
                                'type': 'success'
                        }).then(function(){
                                window.location.href = "index.php";
                        });
                    }else{
                        Swal.fire({
                                'title': 'Inscription réussie!',
                                'text': data+". Vous serez redirigé à la page d'accueil.",
                                'type': 'success'
                        }).then(function(){
                                window.location.href = "index.php";
                        });
                    }
                }
            });
        }
    </script>
</br>
    <div class="table-responsive">
        <h1 style="padding-left: 15px;"><u>Votre sélection</u></h1>
        <form>
            <label for="camp-select">Reférez-vous à l'identifiant unique ci-haut:</label>
            <select id="camp-select" class="register_dropdown"></select>
            <br><br>
            <div class="text-center">
                <input type="button" value="Inscription" class="btn register_btn" onclick="submitForm()">
            </div>
        </form>
        <div id="message"></div>
        <script>
            // Populate the dropdown options when the page loads
            populateDropdown();
        </script>
    </div>

</body>
</html>
