<?php

include "./MenuPlatController.php";

if (isset($_POST["chef_id"]) && isset($_POST["titre_menu"]) && isset($_POST["description_menu"]) && isset($_POST["image_menu"])) {

    echo $_POST['chef_id'];
    echo $_POST['titre_menu'];
    echo $_POST['description_menu'];

}

