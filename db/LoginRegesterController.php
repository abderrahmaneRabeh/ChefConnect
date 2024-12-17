<?php

include __DIR__ . "./connection.php";

$conx = DbConnection();

if ($conx->connect_error) {
    die("Connection failed:  {$conx->connect_error}");
}

function getUsers($conx)
{
    $sql = "SELECT * FROM utilisateurs JOIN roles ON utilisateurs.role_id = roles.id_role";

    $result = $conx->query($sql);

    foreach ($result as $row) {
        echo $row["username"] . " | " . $row["email"] . " | " . $row["pw"] . " | " . $row["type_role"] . "<br>";
    }

}

getUsers($conx);