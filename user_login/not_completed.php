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
    <title>Not completed | PHP</title>
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
    
    <div>
        <h1 style="width: 60%; margin: auto; color: #F7CD3B; text-align: center;">L'implémentation de cette page n'était pas nécessaire pour ce projet donc je ne l'ai pas complétée. Cliquez sur le bouton "Accueil".</h1>
    </div>
</body>

</html>
