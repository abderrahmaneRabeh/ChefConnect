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