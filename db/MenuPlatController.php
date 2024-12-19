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

function Ajouter_un_Menu($conx, $chef_id, $titre_menu, $description_menu, $image_menu)
{
    $sql = "INSERT INTO menus (chef_id, titre_menu, description_menu, img) VALUES ($chef_id, '$titre_menu', '$description_menu', '$image_menu')";
    $result = $conx->query($sql);

    // Check if the query was successful and rows were affected
    if ($result && $conx->affected_rows > 0) {
        return true; // Insert successful
    } else {
        return false; // Insert failed
    }

}

function Get_All_Menu($conx)
{
    $sql = "SELECT * FROM menus";
    $result = $conx->query($sql);

    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function get_One_Menu($conx, $id_menu)
{
    $sql = "SELECT * FROM menus WHERE id_menu  = $id_menu";
    $result = $conx->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}

function Delete_Menu($conx, $id_menu)
{
    $sql = "DELETE FROM menus WHERE id_menu = $id_menu";
    $result = $conx->query($sql);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function Update_Menu($conx, $id_menu, $titre_menu, $description_menu, $image_menu)
{
    $sql = "UPDATE menus SET  titre_menu = '$titre_menu', description_menu = '$description_menu', img = '$image_menu' WHERE id_menu = $id_menu";
    $result = $conx->query($sql);

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }

}

// Plats