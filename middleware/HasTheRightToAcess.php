<?php

function getDirectionUrlByRole()
{
    if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {
        return "admin";
    } else {
        return "client";
    }
}

function redirectUserByRoleLogin()
{
    if (isset($_SESSION["user"])) {
        if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {
            header("Location: ../dashboard/admin/reservation.php");
        } else if (isset($_SESSION["role"]) && $_SESSION["role"] == "user") {
            header("Location: ../dashboard/client/reservation.php");
        }
        exit;
    }
}

function redirectUserByRoleDashboard($role)
{


    if (!isset($_SESSION["role"])) {
        header(header: "Location: /index.php");
        exit;
    }

    if ($_SESSION["role"] != $role) {
        header(header: "Location: /index.php");
        exit;
    }

}



