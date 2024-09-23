<?php
// Ensure session is started if not already
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('admincheck.php');
include('../partials/header.php');
require_once('../config/db.php');

// Prepare an array to hold the appointments
$appointments = [];

// SQL query to fetch all appointments
$sql = "SELECT * FROM appointments ORDER BY date_sentd DESC"; // Replace 'appointments' with your actual table name

// Execute the query
$result = mysqli_query($conn, $sql);

if ($result) {
    // Fetch all rows as associative arrays
    while ($row = mysqli_fetch_assoc($result)) {
        $appointments[] = $row; // Add each appointment to the array
    }
}

function showFlyingAlert($message, $className)
{
    $escapedMessage = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
    echo <<<EOT
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var alertDiv = document.createElement("div");
            alertDiv.className = "{$className}";
            alertDiv.innerHTML = "{$escapedMessage}";
            document.body.appendChild(alertDiv);

            // Initial hidden state (off-screen)
            alertDiv.style.left = "-300px";

            // Triggering reflow to enable animation (necessary for CSS transitions to take effect)
            alertDiv.offsetWidth;

            // Fly-in animation (make it visible)
            alertDiv.style.left = "10px";

            // Fly-out after 4 seconds
            setTimeout(function() {
                alertDiv.style.left = "-300px"; // Fly-out animation
            }, 4000);

            // Remove the element after fly-out completes
            setTimeout(function() {
                alertDiv.remove();
            }, 6000);
        });
    </script>
EOT;
}

// Check for a session message and display it
if (isset($_SESSION['msg'])) {
    $message = $_SESSION['msg'];
    $className = "flying-danger-alert"; // Default to danger alert
    if (stripos($message, "successfully") !== false || stripos($message, "SUCCESSFUL") !== false) {
        $className = "flying-success-alert"; // Set to success alert if message indicates success
    }
    showFlyingAlert($message, $className);
    unset($_SESSION['msg']); // Clear the session message after use
}

$url = $_SERVER['REQUEST_URI'];
?>

<style>
    .flying-success-alert {
        position: fixed;
        z-index: 11111111111111;
        top: 15px;
        left: -300px;
        background-color: var(--primary);
        color: #fff;
        padding: 10px;
        border-radius: 5px;
        transition: left 1.5s ease-in-out;
    }

    .flying-danger-alert {
        position: fixed;
        z-index: 11111111111111;
        top: 15px;
        left: -300px;
        background-color: #FF5252;
        color: #fff;
        padding: 10px;
        border-radius: 5px;
        transition: left 1.5s ease-in-out;
    }
</style>

<div class="container container-xxl py-5" id="cont">
    <div class="content">
        <?php include('../partials/sidebar.php'); ?>
        <button id="menuBtn" class="menu-btn">&#9776;</button>
        <h2 class="h2">All Appointments</h2>
    </div>

    <div class="table-container">
        <table border="">
            <tr>
                <th>S/N</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>SUBJECT</th>
                <th>MESSAGE</th>
                <th>DATE SENT</th>
            </tr>
            <?php $sn = 1; ?>
            <?php foreach ($appointments as $appointment) : ?>
                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $appointment['name'] ?></td>
                    <td><?php echo $appointment['email'] ?></td>
                    <td><?php echo $appointment['subject'] ?></td>
                    <td><?php echo $appointment['message'] ?></td>
                    <td>
                        <?php
                        $appointment_date = new DateTime($appointment['date_sent']);
                        echo $appointment_date->format('d F Y');
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?php include('../partials/footer.php'); ?>

<style>
    .container .content {
        display: flex;
        align-items: center;
    }

    .h2 {
        font-size: 30px;
        margin: 0px;
        margin-left: 20px;
    }

    .h2 span {
        display: inline;
        background: linear-gradient(to right, var(--primary), red);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .table-container {
        width: 100%;
        margin-top: 20px;
        border: 1px solid var(--primary);
        overflow-x: scroll;
        border-radius: 3px;
    }

    table {
        width: 100%;
        text-align: center;
    }

    th,
    td {
        border: 1px solid var(--primary);
        /* Use a solid border with your primary color */
        padding: 5px;
        text-align: center;
    }

    .menu-btn {
        font-size: 30px;
    }

    @media screen and (max-width: 1024px) {
        table {
            width: 1200px;
        }
    }

    @media screen and (max-width: 499px) {
        main {
            padding: 0px;
        }
    }
</style>