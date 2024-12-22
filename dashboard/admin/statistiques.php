<?php

session_start();
include_once '../../db/StatistiqueController.php';
$list_users = Number_of_users($conx);
$Nbr_users = $list_users->num_rows;

$List_Attend_Reservation = Nbr_attend_reservation($conx);
$List_Accepted_Reservation = Nbr_accepted_reservation($conx);
?>


<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Statistiques</title>

    <link rel="stylesheet" href="../css/style.css">
    <script defer src="../js/main.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <link rel="icon" href="../../assets/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/statistiques.css">

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
                <li class="sidebar-list-item">
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
                <li class="sidebar-list-item active">
                    <a href="./statistiques.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-pie-chart">
                            <path d="M21.21 15.89A10 10 0 1 1 8 2.83" />
                            <path d="M22 12A10 10 0 0 0 12 2v10z" />
                        </svg>
                        <span>Statistiques</span>
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
                <h1 class="app-content-headerText">Statistiques</h1>
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

                <!-- diplay users -->
                <div class="users-table-container">
                    <h2 class="section-title">Registered Users</h2>
                    <p class="user-count">Total Users: <?php echo $Nbr_users; ?></p>
                    <table class="users-table">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($list_users)) {
                                foreach ($list_users as $index => $user) {
                                    echo "<tr>
                            <td>" . htmlspecialchars($user['username']) . "</td>
                            <td>" . htmlspecialchars($user['email']) . "</td>
                            <td>
                                " . htmlspecialchars($user['type_role']) . "
                            </td>
                          </tr>";
                                }
                            } else {
                                echo "<tr>
                        <td colspan='3' class='no-data'>No users found</td>
                      </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Diplay Reservations -->

                <!-- Display Reservations -->
                <div class="users-table-container">
                    <h2 class="section-title">Reservations En Attente</h2>
                    <p class="user-count">Total Reservations: <?php echo $List_Attend_Reservation->num_rows; ?></p>
                    <table class="users-table">
                        <thead>
                            <tr>
                                <th>utilisateurs</th>
                                <th>Date de Reservation</th>
                                <th>Time de Reservation</th>
                                <th>Number of People</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // $reservations = get_All_Reservation($conx);
                            if (!empty($List_Attend_Reservation)) {
                                foreach ($List_Attend_Reservation as $reservation) {
                                    echo "<tr>
                        <td>" . htmlspecialchars($reservation['username']) . "</td>
                        <td>" . htmlspecialchars($reservation['date_de_reservation']) . "</td>
                        <td>" . htmlspecialchars($reservation['time_de_reservation']) . "</td>
                        <td>" . htmlspecialchars($reservation['number_of_people']) . "</td>
                        <td>" . htmlspecialchars($reservation['status']) . "</td>
                    </tr>";
                                }
                            } else {
                                echo "<tr>
                    <td colspan='4' class='no-data'>No reservations found</td>
                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- Display Reservations Accepted -->
                <div class="users-table-container">
                    <h2 class="section-title">Reservations Accepter</h2>
                    <p class="user-count">Total Reservations: <?php echo $List_Accepted_Reservation->num_rows; ?></p>
                    <table class="users-table">
                        <thead>
                            <tr>
                                <th>utilisateurs</th>
                                <th>Date de Reservation</th>
                                <th>Time de Reservation</th>
                                <th>Number of People</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // $reservations = get_All_Reservation($conx);
                            if (!empty($List_Accepted_Reservation)) {
                                foreach ($List_Accepted_Reservation as $reservation) {
                                    echo "<tr>
                        <td>" . htmlspecialchars($reservation['username']) . "</td>
                        <td>" . htmlspecialchars($reservation['date_de_reservation']) . "</td>
                        <td>" . htmlspecialchars($reservation['time_de_reservation']) . "</td>
                        <td>" . htmlspecialchars($reservation['number_of_people']) . "</td>
                        <td>" . htmlspecialchars($reservation['status']) . "</td>
                    </tr>";
                                }
                            } else {
                                echo "<tr>
                    <td colspan='4' class='no-data'>No reservations found</td>
                </tr>";
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