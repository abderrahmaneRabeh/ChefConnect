<?php

include "../db/LoginRegesterController.php";


$pw = password_hash("admin", PASSWORD_DEFAULT);

$sql = "Insert Into utilisateurs (username, email, pw, role_id) VALUES ('Rabeh', 'admin@admin.com', '$pw', 2);";

$conx->query($sql);

