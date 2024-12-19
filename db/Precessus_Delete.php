<?php

include "./MenuPlatController.php";


if (isset($_GET["menu_id"])) {
    $result = Delete_Menu($conx, id_menu: $_GET["menu_id"]);

    if ($result) {
        header("Location: ../dashboard/admin/menu.php?msg=Menu Supprimer Avec Succes");
        exit();
    } else {
        header("Location: ../dashboard/admin/menu.php?msg=Menu Non Supprimer");
        exit();
    }
}