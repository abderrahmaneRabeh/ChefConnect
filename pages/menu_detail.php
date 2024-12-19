<?php

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
                <h3 class="section-title">Plates Included</h3>
                <div class="row">
                    <?php if (!empty($menu_plates)): ?>
                        <?php foreach ($menu_plates as $plate): ?>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="plate-card">
                                    <div class="plate-card-image-wrapper">
                                        <img src="<?php echo htmlspecialchars($plate['img']); ?>"
                                            alt="<?php echo htmlspecialchars($plate['nom_de_plat']); ?>"
                                            class="plate-card-image">
                                    </div>
                                    <div class="plate-card-content">
                                        <h5 class="plate-title"> <?php echo htmlspecialchars($plate['nom_de_plat']); ?> </h5>
                                        <p class="plate-description"> <?php echo htmlspecialchars($plate['description']); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="no-plates">No plates available for this menu.</p>
                    <?php endif; ?>
                </div>
            </div>

            <style>
                .menu-plates {
                    padding: 30px 0;
                }

                .section-title {
                    font-size: 1.8rem;
                    margin-bottom: 20px;
                    font-weight: bold;
                    text-transform: uppercase;
                    text-align: center;
                    color: #333;
                }

                .plate-card {
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    border-radius: 8px;
                    overflow: hidden;
                    background: #fff;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                }

                .plate-card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
                }

                .plate-card-image-wrapper {
                    width: 100%;
                    height: 200px;
                    overflow: hidden;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    background-color: #f9f9f9;
                }

                .plate-card-image {
                    max-width: 100%;
                    max-height: 100%;
                    object-fit: cover;
                    border-bottom: 1px solid #ddd;
                }

                .plate-card-content {
                    padding: 15px;
                }

                .plate-title {
                    font-size: 1.2rem;
                    font-weight: bold;
                    color: #444;
                    margin-bottom: 10px;
                }

                .plate-description {
                    font-size: 0.9rem;
                    color: #666;
                    line-height: 1.4;
                }

                .no-plates {
                    font-size: 1rem;
                    color: #999;
                    text-align: center;
                    margin: 20px 0;
                }

                .row {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 20px;
                    justify-content: center;
                }
            </style>

        </div>
    </section>
</body>

</html>