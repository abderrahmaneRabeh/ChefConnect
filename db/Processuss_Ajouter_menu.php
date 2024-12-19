<?php

include "./MenuPlatController.php";

if (isset($_POST["chef_id"]) && isset($_POST["titre_menu"]) && isset($_POST["description_menu"]) && isset($_FILES["image_menu"]) && $_FILES["image_menu"]["error"] == UPLOAD_ERR_OK) {

    $chef_id = $_POST["chef_id"];
    $titre_menu = $_POST["titre_menu"];
    $description_menu = $_POST["description_menu"];

    // Upload the image
    $target_dir = "../assets/images/";
    $target_file = $target_dir . basename($_FILES["image_menu"]["name"]);
    move_uploaded_file($_FILES["image_menu"]["tmp_name"], $target_file);

    $result = Ajouter_un_Menu($conx, $chef_id, $titre_menu, $description_menu, $target_file);

    if ($result) {
        header("Location: ../pages/menu.php?msg=Menu Ajouter avec Succes");
        exit();
    } else {
        header("Location: ../pages/menu.php?msg=Menu Non Ajouter");
        exit();
    }

} else {
    echo "File upload failed";
}

