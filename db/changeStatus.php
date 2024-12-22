<?php

include "./ReservationController.php";

if (isset($_POST["status"]) && isset($_POST["id_reservation"])) {

    $id_reservation = $_POST["id_reservation"];
    $status = $_POST["status"];

    $result = changeStatus($conx, $id_reservation, $status);

    if ($result) {
        header("Location: ../dashboard/admin/reservation.php?msg=Reservation Modifier Avec Succes");
        exit();
    } else {
        header("Location: ../dashboard/admin/reservation.php?msg=Reservation Modifier Avec Succes");
        exit();
    }
}
