<?php

include_once '../db/MenuPlatController.php';


if (isset($_GET["menu_id"])) {
    $menu = get_One_Menu($conx, id_menu: $_GET["menu_id"]);

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChefConnect - Modifier Menu</title>

    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/AjouterMenu.css">
</head>

<body>
    <div class="text-center mt-2 mb-3">
        <div class="btn-group">
            <a href="/index.php" class="btn btn-custom">Retour à Accueil</a>
            <a href="/dashboard/admin/menu.php" class="btn btn-custom">Retour à Dashboard</a>
        </div>
    </div>



    <form action="../db/Processus_Update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="menu_id" value="<?= $menu['id_menu']; ?>">
        <div class="mb-3">
            <label for="titre_menu" class="form-label">Menu Title:</label>
            <input type="text" id="titre_menu" name="titre_menu" class="form-control" placeholder="Enter Menu Title"
                value="<?php echo $menu['titre_menu']; ?>">
        </div>
        <div class="mb-3">
            <label for="description_menu" class="form-label">Description:</label>
            <textarea id="description_menu" name="description_menu" class="form-control" rows="3"
                placeholder="Enter Menu Description"><?php echo $menu['description_menu']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="image_menu" class="form-label">Image:</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image_menu" name="image_menu"
                        aria-describedby="inputGroupFileAddon04">
                    <label class="custom-file-label" for="image_menu">
                        <i class="fas fa-upload"></i> Ajouter une image
                    </label>
                </div>
            </div>
            <img src="<?php echo $menu['img']; ?>" alt="Current Image"
                style="width: 100px; height: auto; margin-top: 10px;">
        </div>
        <button type="submit" class="btn text-white w-100">Modifier Menu</button>
    </form>

</body>

</html>