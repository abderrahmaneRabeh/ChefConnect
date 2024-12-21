<?php

include __DIR__ . "./connection.php";

$conx = DbConnection();

if ($conx->connect_error) {
    die("Connection failed:  {$conx->connect_error}");
}

// Ajouter Reservation

function Ajouter_Reservation($conx, $menu_id, $date_R, $temp_R, $Nbr_Person, $user_id)
{

    $sql = "INSERT INTO reservations (menu_id, date_de_reservation, time_de_reservation, number_of_people, utilisateur_id, status) VALUES
                                    ($menu_id, '$date_R', '$temp_R', $Nbr_Person, $user_id,'en attente')";

    $result = $conx->query($sql);

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}