<?php
session_start();
$direction_Url_by_role = isset($_SESSION["role"]) && $_SESSION["role"] == "admin" ? "admin" : "client";

if (!isset($_GET['menu_id']) || empty($_GET['menu_id'])) {
    die('Invalid menu ID');
}

include '../db/MenuPlatController.php';

$menu_id = intval($_GET['menu_id']);
$menu_details = get_One_Menu($conx, $menu_id); // A function to fetch specific menu details
$menu_plates = Get_Menu_Plates($conx, $menu_id); // A function to fetch all plates for the menu

if (!$menu_details) {
    die('Menu not found');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo htmlspecialchars($menu_details['titre_menu']); ?> - Menu Details</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="/index.php" class="logo text-dark">
                            Chef<span class="text-danger">Connect</span>
                        </a>
                        <ul class="nav">
                            <li><a href="/index.php">Accueil</a></li>
                            <li><a href="./menu.php" class="active">Menus</a></li>
                            <li><a href="./plats.php">Plats</a></li>
                            <?php if (isset($_SESSION["user"])): ?>
                                <li><a href="../dashboard/<?php echo $direction_Url_by_role; ?>/reservation.php">
                                        <?php echo $_SESSION["user"]["username"]; ?></a></li>
                            <?php else: ?>
                                <li><a href="./login.php">S'inscrire</a></li>
                            <?php endif; ?>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <section class="section" id="menu-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="menu-detail-header">
                        <h2><?php echo htmlspecialchars($menu_details['titre_menu']); ?></h2>
                        <p><?php echo htmlspecialchars($menu_details['description_menu']); ?></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="menu-detail-image">
                        <img src="<?php echo htmlspecialchars($menu_details['img']); ?>"
                            alt="<?php echo htmlspecialchars($menu_details['titre_menu']); ?>" class="img-fluid">
                    </div>
                </div>
            </div>

            <div class="menu-plates">
                <h3>Plates Included</h3>
                <div class="row">
                    <?php if (!empty($menu_plates)): ?>
                        <?php foreach ($menu_plates as $plate): ?>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="plate-card">
                                    <div class="plate-card-image">
                                        <img src="<?php echo htmlspecialchars($plate['img']); ?>"
                                            alt="<?php echo htmlspecialchars($plate['nom_de_plat']); ?>" class="img-fluid">
                                    </div>
                                    <div class="plate-card-content">
                                        <h5><?php echo htmlspecialchars($plate['nom_de_plat']); ?></h5>
                                        <p><?php echo htmlspecialchars($plate['description']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No plates available for this menu.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>