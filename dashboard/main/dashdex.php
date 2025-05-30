<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (!isset($_SESSION['username'])) {
    header("Location: /CAFCA-MS/login/logindex.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-store">
    <link rel="icon" href="../../LandingPage/others/logo.png" type="image/x-icon">
    <title>CAFCA | Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!-- MATERIAL ICONS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="dashstyle.css">
</head>

<body>
    <div class="container">
        <aside>
            <div class="top">
                <a class="logo" href="dashdex.php">
                    <img src="../../LandingPage/others/logo.png">
                    <h2>CAFCA <span>MS</span></h2>
                </a>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>

            <div class="sidebar">
                <a href="#" class="active">
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
            <h1>Dashboard</h1>

            <div class="insights">
                <div class="farmers">
                    <span class="material-icons-sharp">groups</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Registered</h3>
                            <h1>Farmers</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='36' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>81%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="attendance">
                    <span class="material-icons-sharp">inventory</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Attendance</h3>
                            <h1>Today</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='36' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>62%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="machines">
                    <span class="material-icons-sharp">agriculture</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Available</h3>
                            <h1>Machines</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='36' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>44%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="calendar-container">
                <h2>Schedule Calendar</h2>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <button id="prev-month"><span class="material-icons-sharp">keyboard_arrow_left</span>Previous</button>
                    <div id="calendar-header"></div>
                    <button id="next-month">Next<span class="material-icons-sharp">keyboard_arrow_right</span></button>
                </div>
                <div id="calendar">
                </div>
            </div>

        </main>

        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
                <div class="theme-toggler">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>
                <div class="profile">
                    <span
                        style="font-size: 18px; text-transform: capitalize; font-weight: 700; "><?= $_SESSION['username']; ?></span>
                    <small class="text-muted">Admin</small>
                </div>
            </div>

            <div class="recent-updates">
                <h2>Recent Updates</h2>
                <div class="updates">
                    <div class="update">
                        <div class="message">
                            <p><b>Ryan</b> hapos lang gid na.</p>
                            <small class="text-muted">1 decade ago.</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="message">
                            <p><b>Grigo</b> Gani, Bel.</p>
                            <small class="text-muted">1 decade ago.</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="message">
                            <p><b>Robel</b> magtanim ay di biro, maghapong nakayuko.</p>
                            <small class="text-muted">1 decade ago.</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="message">
                            <p><b>Michael</b> gainano ta di man?</p>
                            <small class="text-muted">1 decade ago.</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="attendance-sec">
                <h2>Attendance</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Jan Laurence Tan</td>
                            <td class="present">Present</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Ryan Jay Madayag</td>
                            <td class="danger">Absent</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Robel Andrew Ambahan</td>
                            <td class="present">Present</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Jerovi Vargas</td>
                            <td class="danger">Absent</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>John Michael Tombocon</td>
                            <td class="danger">Absent</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Ken Lenard Ababao</td>
                            <td class="present">Present</td>
                        </tr>
                    </tbody>
                </table>
                <a href="#">Show All</a>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const calendar = document.getElementById("calendar");
            const prevBtn = document.getElementById("prev-month");
            const nextBtn = document.getElementById("next-month");
            const header = document.getElementById("calendar-header");

            let currentDate = new Date();

            function renderCalendar(events) {
                const year = currentDate.getFullYear();
                const month = currentDate.getMonth();
                const daysInMonth = new Date(year, month + 1, 0).getDate();
                const firstDay = new Date(year, month, 1).getDay();

                const monthNames = [
                    "January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ];

                header.innerText = `${monthNames[month]} ${year}`;
                calendar.innerHTML = "";

                for (let i = 0; i < firstDay; i++) {
                    calendar.innerHTML += '<div></div>';
                }

                for (let day = 1; day <= daysInMonth; day++) {
                    const cell = document.createElement("div");
                    cell.className = "calendar-day";
                    cell.innerHTML = `<strong>${day}</strong>`;

                    const thisDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;

                    events.forEach(ev => {
                        if (ev.date === thisDate) {
                            const eventDiv = document.createElement("div");
                            eventDiv.className = "event";
                            eventDiv.textContent = ev.title;
                            cell.appendChild(eventDiv);
                        }
                    });

                    calendar.appendChild(cell);
                }
            }

            function loadCalendar() {
                fetch("get_schedules.php")
                    .then(res => res.json())
                    .then(data => renderCalendar(data))
                    .catch(err => console.error("Failed to fetch schedules:", err));
            }

            prevBtn.addEventListener("click", () => {
                currentDate.setMonth(currentDate.getMonth() - 1);
                loadCalendar();
            });

            nextBtn.addEventListener("click", () => {
                currentDate.setMonth(currentDate.getMonth() + 1);
                loadCalendar();
            });

            loadCalendar();
        });
    </script>

    <script src="dashscript.js"></script>
</body>

</html>