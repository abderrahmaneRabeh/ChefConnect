<?php

include __DIR__ . "./connection.php";

function login($conx, $email, $password)
{
    $sql = "SELECT * FROM utilisateurs JOIN roles ON utilisateurs.role_id = roles.id_role";

    $result = $conx->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row["email"] == $email && $row["password"] == $password) {
                return $row;
            }
        }
    }




}