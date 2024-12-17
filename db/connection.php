<?php

function DbConnection($server = "localhost", $username = "root", $password = "", $database = "chef_cuisinier")
{
    $connection = new mysqli($server, $username, $password, $database);
    return $connection;
}