<?php

include __DIR__ . "./connection.php";

$conx = DbConnection();

if ($conx->connect_error) {
    die("Connection failed:  {$conx->connect_error}");
}

function Number_of_users($conx)
{
    $result = $conx->query("SELECT * FROM utilisateurs join roles where role_id = 1 AND roles.type_role = 'user'");

    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }

}

function Nbr_attend_reservation($conx)
{
    $result = $conx->query("SELECT * FROM reservations join utilisateurs on reservations.utilisateur_id = utilisateurs.id_utilisateur and status = 'en attente'");
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function Nbr_accepted_reservation($conx)
{
    $result = $conx->query("SELECT * FROM reservations join utilisateurs on reservations.utilisateur_id = utilisateurs.id_utilisateur and status = 'acceptée'");
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}