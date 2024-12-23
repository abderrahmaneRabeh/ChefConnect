<?php

session_start();

include_once '../../db/ReservationController.php';
include_once '../../middleware/HasTheRightToAcess.php';
if (isset($_SESSION['user'])) {

    $List_Reservation = get_User_Reservations($conx, $_SESSION['user']['id_utilisateur']);
}


redirectUserByRoleDashboard(role: "user");

?>

<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Reservation</title>

    <link rel="stylesheet" href="../css/style.css">
    <script defer src="../js/main.js"></script>
    <link rel="stylesheet" href="../css/Reservation.css">
    <link rel="icon" href="../../assets/images/logo.png" type="image/x-icon">
    <style>
        td,
        th {
            text-align: center;
        }

        .annuler_btn {
            background-color: #e74c3c;
            color: white;
            padding: 5px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;

        }

        .annuler_btn:hover {
            background-color: #c0392b;
        }
    </style>
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

                <div class="products-area-wrapper tableView">
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>Menu</th>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Nombre de Personnes</th>
                                <th>Status</th>
                                <th>Annuler</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if ($List_Reservation) {
                                // Assume $reservations is an array of reservation data
                                foreach ($List_Reservation as $reservation) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($reservation['titre_menu']) . "</td>";
                                    echo "<td>" . htmlspecialchars($reservation['date_de_reservation']) . "</td>";
                                    echo "<td>" . htmlspecialchars($reservation['time_de_reservation']) . "</td>";
                                    echo "<td>" . htmlspecialchars($reservation['number_of_people']) . "</td>";
                                    echo "<td>
                                         <span class='status-label' style='
                                             background-color: " . ($reservation['status'] == 'en attente' ? '#f7dc6f' :
                                        ($reservation['status'] == 'acceptée' ? '#8bc34a' : '#e74c3c')) . ";
                                             border-radius: 0.25rem;
                                             padding: 0.25rem;
                                             font-size: 0.8rem;
                                             font-weight: 600;
                                             color: " . ($reservation['status'] == 'en attente' ? 'black' :
                                        ($reservation['status'] == 'acceptée' ? 'white' : 'white')) . ";'>" .
                                        htmlspecialchars($reservation['status']) .
                                        "</span></td>";
                                    if ($reservation['status'] == 'en attente') {
                                        echo "<td>
                                            <a href='../../db/annulerReservation.php?reservation_id=" . $reservation['id_reservation'] . "' class='annuler_btn'>
                                                <i class='fas fa-times-circle'></i> Annuler
                                            </a>
                                        </td>";
                                    } else {
                                        echo "<td>vous ne pouvez pas annuler cette réservation</td>";
                                    }
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
    </div>

</body>

</html>