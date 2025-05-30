<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /CAFCA-MS/login/logindex.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../LandingPage/others/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAFCA | Admin</title>
    <link rel="stylesheet" href="../farmers_sec/farmerstyle.css">
    <!-- MATERIAL ICONS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
</head>

<body>
    <div class="container">
        <aside>
            <div class="top">
                <a class="logo" href="../main/dashdex.php">
                    <img src="../../LandingPage/others/logo.png">
                    <h2>CAFCA <span>MS</span></h2>
                </a>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>

            <div class="sidebar">
                <a href="../main/dashdex.php">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="../farmers_sec/farmers.php">
                    <span class="material-icons-sharp">people</span>
                    <h3>Farmers</h3>
                </a>
                <a href="../machines/machine.php">
                    <span class="material-icons-sharp">agriculture</span>
                    <h3>Machines</h3>
                </a>
                <a href="../schedules/schedule.php">
                    <span class="material-icons-sharp">event</span>
                    <h3>Schedules</h3>
                </a>
                <a href="#" class="active">
                    <span class="material-icons-sharp">topic</span>
                    <h3>Records</h3>
                </a>
                <a href="../../login/logout.php" class="danger">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>
            </div>
        </aside>

        <main>
            <div class="top">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
                <div class="theme-toggler">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>
                <div class="profile" style="display: flex; flex-direction: column; text-align: right;">
                    <span
                        style="font-size: 18px; text-transform: capitalize; font-weight: 700; "><?= $_SESSION['username']; ?></span>
                    <small class="text-muted">Admin</small>
                </div>
            </div>
            <h2>Harvest Records</h2>
                
            <a href="add_records.php" class="btn btn-primary" role="button">Add Record</a>
            <br>
            <table style="width: 100%;" class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Farmer</th>
                        <th>Machine</th>
                        <th>Harvest Date</th>
                        <th>Number of Sacks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "testdb";

                    $conn = new mysqli($servername, $username, $password, $database);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "
                        SELECT 
                            records.id AS id,
                            farmers.name AS farmer_name,
                            machines.name AS machine_name,
                            records.harvest_date,
                            records.number_of_sacks
                        FROM records
                        JOIN farmers ON records.farmer_id = farmers.id
                        JOIN machines ON records.machine_id = machines.id
                    ";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[farmer_name]</td>
                        <td>$row[machine_name]</td>
                        <td>$row[harvest_date]</td>
                        <td>$row[number_of_sacks]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='edit_records.php?id=$row[id]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='delete_records.php?id=$row[id]'>Delete</a>
                        </td> 
                    </tr>
                    ";
                    }

                    ?>

                </tbody>
            </table>
        </main>
    </div>


    <script src="../main/dashscript.js"></script>
</body>

</html>