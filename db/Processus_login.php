<?php

include "./LoginRegesterController.php";
// Include the database connection file and the LoginRegesterController functions

if (isset($_POST["email"]) && isset($_POST["password"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $isExist = Check_Exist_User($conx, $email);
    // this function check the existing user in the database and return true or false

    if ($isExist) {
        // if the user exist in the database then

        if (!Check_haghing_password($conx, $email, $password)) {
            header("Location: ../pages/login.php?error=Le compte n'a pas pu etre cree");
            exit;
        }

        $role = Check_Role($conx, $email);

        $Selected_Id = $role["id_utilisateur"];
        //we get the role of the user

        $Selected_User = Select_User_by_Id($conx, $Selected_Id);
        // we get the user from the database


        session_start();

        $_SESSION["user"] = $Selected_User;
        $_SESSION["role"] = $role["type_role"];

        // echo "<pre>";
        // print_r($_SESSION);
        // echo "</pre>";


        switch ($role["type_role"]) {
            // we redirect the user to the dashboard according to the role
            case "admin":
                header("Location: ../dashboard/admin/reservation.php");
                break;
            default:
                header("Location: ../dashboard/client/reservation.php");
                break;
        }

    } else {
        header("Location: ../pages/login.php?error=Email ou mot de passe incorrect");
        // if the user doesn't exist in the database then we redirect the user to the login page
    }

}