<?php

include_once '../db/MenuPlatController.php';
include_once '../middleware/HasTheRightToAcess.php';

$direction_Url_by_role = getDirectionUrlByRole();

$listPlats = Get_All_Plats($conx);


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

    <title>ChefConnect - Menu</title>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">

    <link rel="stylesheet" href="../assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="../assets/css/owl-carousel.css">

    <link rel="stylesheet" href="../assets/css/lightbox.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/plats.css">

    <link rel="icon" href="../assets/images/logo.png" type="image/x-icon">

</head>

<body>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/index.php" class="logo text-dark">
                            Chef<span class="text-danger">Connect</span>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="/index.php">Accueil</a></li>
                            <li class="scroll-to-section"><a href="./menu.php">Menus</a></li>
                            <li class="scroll-to-section"><a href="#">Plats</a></li>
                            <?php
                            session_start();
                            if (isset($_SESSION["user"])) {
                                echo '<li class="scroll-to-section"><a id="login" href="../dashboard/' . $direction_Url_by_role . '/reservation.php">' . $_SESSION["user"]["username"] . '</a></li>';
                            } else {
                                echo '<li class="scroll-to-section"><a href="./login.php" id="login">S\'inscrire</a></li>';
                            }
                            ?>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->


    <!-- ***** Menu Area Starts ***** -->

    <section class="section" id="offers">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 text-center">
                    <div class="section-heading">
                        <h6 class="text-primary">Les Plats de ChefConnect</h6>
                        <h2 class="mb-4">Explorez Nos Délices Gastronomiques</h2>
                        <p class="text-muted">
                            Découvrez une sélection soigneusement préparée de nos meilleurs plats, alliant saveur et
                            présentation.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($listPlats as $plat): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card border-0 shadow-sm rounded-4 position-relative overflow-hidden h-100">
                            <img src="<?php echo htmlspecialchars($plat['img']); ?>" class="card-img-top"
                                alt="<?php echo htmlspecialchars($plat['nom_de_plat']); ?>"
                                style="object-fit: cover; height: 150px; border-radius: 10px 10px 0 0;">
                            <div class="card-body text-center p-3">
                                <h6 class="card-title text-dark font-weight-bold mb-2">
                                    <?php echo htmlspecialchars($plat['nom_de_plat']); ?>
                                </h6>
                                <p class="card-text text-muted small mb-3">
                                    <?php echo htmlspecialchars($plat['description']); ?>
                                </p>
                            </div>
                            <div class="card-footer bg-white border-0 text-center">
                                <small class="text-muted">Menu: <?php echo htmlspecialchars($plat['titre_menu']); ?></small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- end menu -->
    <!-- ***** Menu Area Ends ***** -->


    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="index.html"><img src="../assets/images/white-logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>© Copyright Klassy Cafe Co.

                            <br>Design: TemplateMo
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="../assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Global Init -->
    <script src="../assets/js/custom.js"></script>
    <script>

        $(function () {
            var selectedClass = "";
            $("p").click(function () {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function () {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);

            });
        });

    </script>
</body>

</html>