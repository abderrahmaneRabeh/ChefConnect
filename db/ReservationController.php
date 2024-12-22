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

function get_All_Reservation($conx)
{
    $sql = "SELECT * FROM reservations";
    $result = $conx->query($sql);

    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}
function get_one_Reservation($conx, $id_reservation)
{
    $sql = "SELECT * FROM reservations WHERE id_reservation = $id_reservation";
    $result = $conx->query($sql);

    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function get_User_Reservations($conx, $id_user)
{
    $sql = "SELECT * FROM reservations JOIN menus ON reservations.menu_id = menus.id_menu WHERE utilisateur_id = $id_user";
    $result = $conx->query($sql);

    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function changeStatus($conx, $id_reservation, $status)
{
    $sql = "UPDATE reservations SET status = '$status' WHERE id_reservation = $id_reservation";
    $result = $conx->query($sql);

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }

}