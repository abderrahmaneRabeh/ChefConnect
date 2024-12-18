<?php

include "./LoginRegesterController.php";
// Include the database connection file and the LoginRegesterController functions

if (isset($_GET["name"]) && isset($_GET["email"]) && isset($_GET["pw"])) {

    $username = $_GET["name"];
    $email = $_GET["email"];
    $pw = $_GET["pw"];

    $isExist = Check_Exist_User($conx, $email);

    if (!$isExist) {
        $added_user = Ajouter_User($conx, $username, $email, $pw);

        if ($added_user) {

            $Selected_User = Selected_User_By_Email_username($conx, $email, $username);

            $role = Check_Role($conx, $email, $pw);

            session_start();

            $_SESSION["user"] = $Selected_User;
            $_SESSION["role"] = $role["type_role"];

            header("Location: ../index.php");
        } else {
            header("Location: ../pages/login.php?error=Le compte n'a pas pu etre cree");
        }
    } else {
        header("Location: ../pages/login.php?error=Le compte existe deja");
    }
}