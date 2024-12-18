<?php

include __DIR__ . "./connection.php";

$conx = DbConnection();

// LOGIN functions

if ($conx->connect_error) {
    die("Connection failed:  {$conx->connect_error}");
}

function get_admin_user($conx)
{
    $sql = "SELECT * FROM utilisateurs JOIN roles ON utilisateurs.role_id = roles.id_role WHERE roles.type_role = 'admin' ";
    $result = $conx->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}