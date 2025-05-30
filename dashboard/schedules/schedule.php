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
                <a href="#" class="active">
                    <span class="material-icons-sharp">event</span>
                    <h3>Schedules</h3>
                </a>
                <a href="../records/records.php">
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
                <div class="theme-toggler" title="Theme">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>
                <div class="profile" style="display: flex; flex-direction: column; text-align: right;">
                    <span
                        style="font-size: 18px; text-transform: capitalize; font-weight: 700; "><?= $_SESSION['username']; ?></span>
                    <small class="text-muted">Admin</small>
                </div>
            </div>
            <h2>List of Schedules</h2>

            <a href="add_schedule.php" class="btn btn-primary" role="button">Create a Schedule</a>
            <br>
            <table style="width: 100%;" class="table">
                <thead>
                    <tr>
                        <th>Schedule ID</th>
                        <th>Farmer</th>
                        <th>Machine</th>
                        <th>Schedule Date</th>
                        <th>Date Span (days)</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Status</th>
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
                            schedules.id AS id,
                            farmers.name AS farmer_name,
                            machines.name AS machine_name,
                            schedules.schedule_date,
                            schedules.date_span,
                            schedules.start_time,
                            schedules.end_time,
                            schedules.status
                        FROM schedules
                        JOIN farmers ON schedules.farmer_id = farmers.id
                        JOIN machines ON schedules.machine_id = machines.id
                    ";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        $schedule_start = strtotime($row['schedule_date'] . ' ' . $row['start_time']);
                        $schedule_end = strtotime(date('Y-m-d', strtotime($row['schedule_date'] . " +{$row['date_span']} days")) . ' ' . $row['end_time']);
                        $now = time();

                        if ($now < $schedule_start) {
                            $dynamic_status = "Pending";
                        } elseif ($now >= $schedule_start && $now <= $schedule_end) {
                            $dynamic_status = "On going";
                        } else {
                            $dynamic_status = "Completed";
                        }

                        echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[farmer_name]</td>
                        <td>$row[machine_name]</td>
                        <td>$row[schedule_date]</td>
                        <td>$row[date_span]</td>
                        <td>$row[start_time]</td>
                        <td>$row[end_time]</td>
                        <td>$dynamic_status</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='edit_schedule.php?id=$row[id]'>Edit</a>
                            <a class='btn btn-success btn-sm' href='print_certificate.php?id=$row[id]' target='_blank'>Details</a>
                            <a class='btn btn-danger btn-sm' href='delete_schedule.php?id=$row[id]'>Delete</a>
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