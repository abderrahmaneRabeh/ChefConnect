<?php

include __DIR__ . "./connection.php";

$conx = DbConnection();

if ($conx->connect_error) {
    die("Connection failed:  {$conx->connect_error}");
}

function Get_Users($conx)
{
    $sql = "SELECT * FROM utilisateurs JOIN roles ON utilisateurs.role_id = roles.id_role";

    return $conx->query($sql);

}

function Check_Exist_User($conx, $email, $password)
{
    $sql = "SELECT * FROM utilisateurs WHERE email = '$email' AND pw = '$password'";

    $result = $conx->query($sql);

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function Check_Role($conx, $email, $password)
{
    $sql = "SELECT roles.type_role, utilisateurs.id_utilisateur FROM utilisateurs JOIN roles ON utilisateurs.role_id = roles.id_role WHERE email = '$email' AND pw = '$password'";

    $result = $conx->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['type_role'];
    } else {
        return false;
    }
}

function Select_User($conx, $selectedUserId, $idUser)
{
    $sql = "SELECT * FROM utilisateurs WHERE id_utilisateur = {$selectedUserId}";
}



