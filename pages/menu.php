<?php

$direction_Url_by_role;

if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {
    $direction_Url_by_role = "admin";
} else {
    $direction_Url_by_role = "client";
}

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
    <link rel="stylesheet" href="../assets/css/menu.css">
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
                            <li class="scroll-to-section"><a href="./plats.php">Plats</a></li>
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

    <section class="section" id="menu">
        <div class=" container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>Explorer Menu</h6>
                        <h2>Reservée Un Menu</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item-carousel">
            <div class="col-lg-12">
                <div class="owl-menu-item owl-carousel">
                    <div class="item">
                        <div class='card card1'>
                            <div class="price">
                                <h6>$14</h6>
                            </div>
                            <div class='info'>
                                <h1 class='title'>Chocolate Cake</h1>
                                <p class='description'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedii do
                                    eiusmod teme.</p>
                                <div class="main-text-button">
                                    <div class="scroll-to-section"><a href="#reservation">Make Reservation <i
                                                class="fa fa-angle-down"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class='card card2'>
                            <div class="price">
                                <h6>$22</h6>
                            </div>
                            <div class='info'>
                                <h1 class='title'>Klassy Pancake</h1>
                                <p class='description'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedii do
                                    eiusmod teme.</p>
                                <div class="main-text-button">
                                    <div class="scroll-to-section"><a href="#reservation">Make Reservation <i
                                                class="fa fa-angle-down"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class='card card3'>
                            <div class="price">
                                <h6>$18</h6>
                            </div>
                            <div class='info'>
                                <h1 class='title'>Tall Klassy Bread</h1>
                                <p class='description'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedii do
                                    eiusmod teme.</p>
                                <div class="main-text-button">
                                    <div class="scroll-to-section"><a href="#reservation">Make Reservation <i
                                                class="fa fa-angle-down"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class='card card4'>
                            <div class="price">
                                <h6>$10</h6>
                            </div>
                            <div class='info'>
                                <h1 class='title'>Blueberry CheeseCake</h1>
                                <p class='description'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedii do
                                    eiusmod teme.</p>
                                <div class="main-text-button">
                                    <div class="scroll-to-section"><a href="#reservation">Make Reservation <i
                                                class="fa fa-angle-down"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class='card card5'>
                            <div class="price">
                                <h6>$8.50</h6>
                            </div>
                            <div class='info'>
                                <h1 class='title'>Klassy Cup Cake</h1>
                                <p class='description'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedii do
                                    eiusmod teme.</p>
                                <div class="main-text-button">
                                    <div class="scroll-to-section"><a href="#reservation">Make Reservation <i
                                                class="fa fa-angle-down"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class='card card3'>
                            <div class="price">
                                <h6>$7.25</h6>
                            </div>
                            <div class='info'>
                                <h1 class='title'>Klassic Cake</h1>
                                <p class='description'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedii do
                                    eiusmod teme.</p>
                                <div class="main-text-button">
                                    <div class="scroll-to-section"><a href="#reservation">Make Reservation <i
                                                class="fa fa-angle-down"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="../assets/js/owl-carousel.js"></script>
    <script src="../assets/js/accordions.js"></script>
    <script src="../assets/js/datepicker.js"></script>
    <script src="../assets/js/scrollreveal.min.js"></script>
    <script src="../assets/js/waypoints.min.js"></script>
    <script src="../assets/js/jquery.counterup.min.js"></script>
    <script src="../assets/js/imgfix.min.js"></script>
    <script src="../assets/js/slick.js"></script>
    <script src="../assets/js/lightbox.js"></script>
    <script src="../assets/js/isotope.js"></script>

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