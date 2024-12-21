<?php

include_once '../db/MenuPlatController.php';

if (isset($_GET['menu_id'])) {
    $menuData = get_One_Menu($conx, $_GET['menu_id']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Reservation Form</title>
    <link rel="stylesheet" href="../assets/css/ReserveMenu.css">
</head>

<body>
    <div style="margin-block: 20px; text-align: center;">
        <a href="/index.php" class="btn" style="text-decoration: none;">Retour à Accueil</a>
    </div>

    <div class="form-container">
        <h1>Menu Reservation</h1>
        <form action="../db/Processus_Reservation.php" method="post">
            <div class="form-group">
                <label for="menu_id">Menu ID</label>
                <select id="menu_id" name="menu_id" required>
                    <option value="<?= $menuData['id_menu']; ?>" selected><?= $menuData['titre_menu']; ?>
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="date_de_reservation">Date of Reservation</label>
                <input type="date" id="date_de_reservation" name="date_de_reservation" required>
            </div>
            <div class="form-group">
                <label for="time_de_reservation">Time of Reservation</label>
                <input type="time" id="time_de_reservation" name="time_de_reservation" required>
            </div>
            <div class="form-group">
                <label for="number_of_people">Number of People</label>
                <input type="number" id="number_of_people" name="number_of_people" min="1" required>
            </div>
            <button type="submit" class="btn">Reserve Maintenant</button>
        </form>
    </div>
</body>

</html>