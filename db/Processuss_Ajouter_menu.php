<?php

include __DIR__ . "./connection.php";

$conx = DbConnection();

// LOGIN functions

if ($conx->connect_error) {
    die("Connection failed:  {$conx->connect_error}");
}