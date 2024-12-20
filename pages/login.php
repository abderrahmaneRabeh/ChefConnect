<?php

include '../middleware/HasTheRightToAcess.php';

session_start();

redirectUserByRoleLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <title>ChefConnect - Home</title>
    <!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/css/login.css">

</head>

<body>

    <p class="text-center"><a href="../index.php" class="text-primary">Retour &agrave; l'accueil</a></p>

    <?php

    if (isset($_GET['error'])) {
        echo '<h3 class="text-danger text-center">' . $_GET['error'] . '</h3>';
    }

    ?>
    <section class="form-section">
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="../db/Processus_register.php">
                    <h1>S'inscrire</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="social"><i class="fa fa-google"></i></a>
                        <a href="#" class="social"><i class="fa fa-linkedin"></i></a>
                    </div>
                    <span>or use your email for registration</span>
                    <input type="text" placeholder="Name" name="name" required />
                    <input type="email" placeholder="Email" name="email" required />
                    <input type="password" placeholder="Password" name="pw" required />
                    <button>Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="../db/Processus_login.php" method="post">
                    <h1>Connecter</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="social"><i class="fa fa-google"></i></a>
                        <a href="#" class="social"><i class="fa fa-linkedin"></i></a>
                    </div>
                    <span>ou Avec mail et password</span>
                    <input type="email" placeholder="Email" name="email" required />
                    <input type="password" placeholder="Password" name="password" required />
                    <button>Sign In</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Bienvenue de nouveau !</h1>
                        <p>Pour rester connect avec nous, veuillez vous identifier avec vos informations personnelles
                        </p>
                        <button class="ghost" id="signIn">Se Connecter</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Bonjour</h1>
                        <p>Entrez vos informations personnelles et commencez votre aventure avec nous</p>
                        <button class="ghost" id="signUp">S'inscrire</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../assets/js/login.js"></script>
    <script>

    </script>
</body>

</html>