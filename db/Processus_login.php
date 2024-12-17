<?php

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    echo "email: {$email} <br> password:  {$password} <br>";
}