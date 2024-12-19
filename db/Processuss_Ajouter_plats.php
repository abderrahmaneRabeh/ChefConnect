<?php

include "./MenuPlatController.php";




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $platsData = [];
    foreach ($_POST['nom_de_plat'] as $index => $platName) {
        $menuId = $_POST['menu_id'][$index];
        $description = $_POST['description'][$index];
        $img = $_FILES['img'];

        if (isset($img['tmp_name'][$index]) && isset($img['name'][$index])) {
            $tmpName = $img['tmp_name'][$index];
            $imgPath = $img['name'][$index];

            $platsData[] = [
                'menu_id' => $menuId,
                'nom_de_plat' => $platName,
                'description' => $description,
                'img_path' => $imgPath,
                'img_tmp_path' => $tmpName
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChefConnect - Display Plats</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.css">
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-4">Plats</h2>
        <div class="row">
            <?php if (!empty($platsData)): ?>
                <?php foreach ($platsData as $plat): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <p class="card-text">Image Path: <?php echo htmlspecialchars($plat['img_tmp_path']); ?></p>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($plat['nom_de_plat']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($plat['description']); ?></p>
                                <p class="card-text">Menu ID: <?php echo htmlspecialchars($plat['menu_id']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">Aucun plat à afficher.</p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>