<?php

include "./MenuPlatController.php";

if (isset($_GET["id_plat"])) {
    $id_plats = $_GET["id_plat"];
    if (Delete_Plat($conx, $id_plats)) {
        header("Location: ../dashboard/admin/plats.php?msg=Plat Supprimer Avec Succes");
    } else {
        header("Location: ../dashboard/admin/plats.php?msg=Plat Non Supprimer");
    }
}