<?php

include __DIR__ . "./connection.php";

$conx = DbConnection();

// LOGIN functions

if ($conx->connect_error) {
    die("Connection failed:  {$conx->connect_error}");
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
        return $result->fetch_assoc();
    } else {
        return false;
    }
}

function Select_User($conx, $selectedUserId)
{
    $sql = "SELECT * FROM utilisateurs WHERE id_utilisateur = {$selectedUserId}";
    $result = $conx->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}

// REGISTER functions

function Ajouter_User($conx, $userName, $email, $pw)
{
    $sql = "INSERT INTO utilisateurs (username, email, pw, role_id) VALUES ('$userName', '$email', '$pw',1)";
    $result = $conx->query($sql);

    if ($result->affected_rows > 0) {
        return true;
    } else {
        return false;
    }

}



