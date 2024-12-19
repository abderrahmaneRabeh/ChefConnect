<?php

include "./MenuPlatController.php"; // Include your MenuPlatController which contains the Add_Plats function

$is_all_valid_for_redirection = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST['nom_de_plat'] as $index => $platName) {
        $menuId = $_POST['menu_id'][$index];
        $description = $_POST['description'][$index];
        $img = $_FILES['img']['name'][$index]; // Get the filename for the image

        // Move the uploaded file to the correct directory (if needed)
        $uploadDir = '../assets/images/';
        $imgPath = $uploadDir . basename($img);

        if (move_uploaded_file($_FILES['img']['tmp_name'][$index], to: $imgPath)) {
            // Call the Add_Plats function to insert data into the database
            if (Add_Plats($conx, $menuId, $platName, $description, $imgPath)) {
                echo "Plat added successfully!";
                $is_all_valid_for_redirection = true;
            } else {
                echo "Failed to add plat.";
                $is_all_valid_for_redirection = false;
            }
        } else {
            echo "Error uploading file: $img";
        }
    }
}

if ($is_all_valid_for_redirection) {
    header("Location: ../dashboard/admin/menu.php?msg=Plats Ajouter Avec Succes");
    exit();
} else {
    header("Location: ../dashboard/admin/menu.php?msg=Plats Non Ajouter");
    exit();
}
