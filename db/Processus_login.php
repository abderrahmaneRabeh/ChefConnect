<?php

include "./LoginRegesterController.php";
// Include the database connection file and the LoginRegesterController functions

if (isset($_POST["email"]) && isset($_POST["password"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $isExist = Check_Exist_User($conx, $email, $password);
    // this function check the existing user in the database

    if ($isExist) {

        $role = Check_Role($conx, $email, $password);

        switch ($role) {
            case "admin":
                header("Location: ../dashboard/admin/reservation.php");
                break;
            default:
                header("Location: ../dashboard/client/reservation.php");
                break;
        }
    } else {
        header("Location: ../pages/login.php?error=Email ou mot de passe incorrect");
    }



}