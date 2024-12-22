<?php

session_start();

// include_once '../../db/MenuPlatController.php';
include_once '../../db/ReservationController.php';
include_once '../../middleware/HasTheRightToAcess.php';


$Reservation_list = get_All_Reservation($conx);
redirectUserByRoleDashboard("admin");
// exit;

?>


<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Reservation</title>

    <link rel="stylesheet" href="../css/style.css">
    <script defer src="../js/main.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <link rel="icon" href="../../assets/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/Reservation.css">

</head>

<body>

    <div class="app-container">
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="app-icon">
                    <div class="app-icon-title app-icon-title-a-tag">
                        <a href="../../index.php">
                            CHEF<span class="text-danger">CONNECT</span>
                        </a>
                    </div>
                </div>
            </div>
            <ul class="sidebar-list">
                <li class="sidebar-list-item active">
                    <a href="./reservation.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            <polyline points="9 22 9 12 15 12 15 22" />
                        </svg>
                        <span>Reservation</span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="./menu.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-shopping-bag">
                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                            <line x1="3" y1="6" x2="21" y2="6" />
                            <path d="M16 10a4 4 0 0 1-8 0" />
                        </svg>
                        <span>Menus</span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="./plats.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-pie-chart">
                            <path d="M21.21 15.89A10 10 0 1 1 8 2.83" />
                            <path d="M22 12A10 10 0 0 0 12 2v10z" />
                        </svg>
                        <span>Plats</span>
                    </a>
                </li>
            </ul>
            <div class="account-info">

                <?php
                if (isset($_SESSION["user"])) {
                    echo "<div class=\"account-info-name\">" . $_SESSION["user"]["username"] . "</div>";

                } else {
                    echo '<li class="scroll-to-section"><a href="./pages/login.php" id="login">S\'inscrire</a></li>';
                }

                ?>
                <a href="/db/lougout.php" class="account-info-more lougout-btn">
                    <button class="account-info-more"
                        style="display: flex; align-items: center; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-log-out">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                            <polyline points="16 17 21 12 16 7" />
                            <line x1="21" y1="12" x2="9" y2="12" />
                        </svg>
                    </button>
                </a>
            </div>
        </div>
        <div class="app-content">
            <div class="app-content-header">
                <h1 class="app-content-headerText">Reservation</h1>
                <button class="mode-switch" title="Switch Theme">
                    <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                        <defs></defs>
                        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                    </svg>
                </button>
            </div>
            <div class="app-content-actions">
                <div class="app-content-actions-wrapper">
                    <div class="filter-button-wrapper">
                        <button class="action-button d-none filter jsFilter"></button>
                    </div>
                    <button class="action-button d-none list active" title="List View">
                    </button>
                    <button class="action-button d-none grid" title="Grid View">
                    </button>
                </div>
            </div>
            <div class="products-area-wrapper tableView">

                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Utilisateur</th>
                            <th>Menu</th>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Nombre de Personnes</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if ($Reservation_list) {
                            // Assume $reservations is an array of reservation data
                            foreach ($Reservation_list as $reservation) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($reservation['id_reservation']) . "</td>";
                                echo "<td>" . htmlspecialchars($reservation['utilisateur_id']) . "</td>";
                                echo "<td>" . htmlspecialchars($reservation['menu_id']) . "</td>";
                                echo "<td>" . htmlspecialchars($reservation['date_de_reservation']) . "</td>";
                                echo "<td>" . htmlspecialchars($reservation['time_de_reservation']) . "</td>";
                                echo "<td>" . htmlspecialchars($reservation['number_of_people']) . "</td>";
                                echo "<td><form action='/db/changeStatus.php' method='post'>
                            <select name='status' id='status' class='form-control' onchange='this.form.submit()'>
                            <option value='en attente' " . ($reservation['status'] == 'en attente' ? 'selected' : '') . ">En attente</option>
                            <option value='acceptée' " . ($reservation['status'] == 'acceptée' ? 'selected' : '') . ">acceptée</option>
                            <option value='refusée' " . ($reservation['status'] == 'refusée' ? 'selected' : '') . ">refusée</option>
                            </select>
                            <input type='hidden' name='id_reservation' value='" . htmlspecialchars($reservation['id_reservation']) . "'>
                            </form></td>";

                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center'>Aucune reservation</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>