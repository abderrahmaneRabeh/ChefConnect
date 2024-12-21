<?php

include "./ReservationController.php";
session_start();

$id_utilisateur = null;
if (isset($_SESSION["user"])) {
    $id_utilisateur = $_SESSION["user"]["id_utilisateur"];
}

if (isset($_POST["menu_id"]) && isset($_POST["date_de_reservation"]) && isset($_POST["time_de_reservation"]) && isset($_POST["number_of_people"])) {

    $menu_id = $_POST["menu_id"];
    $date_R = $_POST["date_de_reservation"];
    $temp_R = $_POST["time_de_reservation"];
    $Nbr_Person = $_POST["number_of_people"];

    $result = Ajouter_Reservation($conx, $menu_id, $date_R, $temp_R, $Nbr_Person, $id_utilisateur);

    if ($result) {
        header("Location: ../dashboard/admin/reservation.php?msg=Reservation Ajouter avec Succes");
        exit();
    } else {
        header("Location: ../pages/menu.php?msg=Reservation Non Ajouter");
        exit();
    }
}