<?php

session_start();

include "../middleware/HasTheRightToAcess.php";
include '../db/MenuPlatController.php';

$direction_Url_by_role = getDirectionUrlByRole();

$Menu_List = Get_All_Menu($conx);

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
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>Explore Menu</h6>
                        <h2>Reserve a Menu</h2>
                    </div>
                </div>
            </div>
            <div id="list_menu">
                <div class="row">
                    <?php foreach ($Menu_List as $menu): ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <a href="menu_detail.php?menu_id=<?php echo $menu['id_menu']; ?>" class="menu-card-link">
                                <div class="menu-card shadow-sm">
                                    <div class="menu-card-image">
                                        <img src="<?php echo htmlspecialchars($menu['img']); ?>"
                                            alt="<?php echo htmlspecialchars($menu['titre_menu']); ?>" class="img-fluid"
                                            style="width: 100%; height: 200px; object-fit: cover;">
                                    </div>
                                    <div class="menu-card-content">
                                        <h5><?php echo htmlspecialchars($menu['titre_menu']); ?></h5>
                                        <p><?php echo htmlspecialchars($menu['description_menu']); ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
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
    <!-- Global Init -->
</body>

</html>