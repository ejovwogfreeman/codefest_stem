<?php
ob_start();
// Ensure session is started if not already
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('../partials/header.php');
require_once('../config/db.php');

$username = $password = '';
$errors = [];

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $username = trim($_POST['username']);
    $password = trim($_POST['password']); // Keep the password as a plain string

    // Validate username and password
    if (empty($username)) {
        $errors['username'] = 'Username is required.';
    }
    if (empty($password)) {
        $errors['password'] = 'Password is required.';
    }

    // If no errors, proceed to check credentials
    if (empty($errors)) {
        $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ? AND password = ?");
        mysqli_stmt_bind_param($stmt, 'ss', $username, $password); // Bind both username and password
        mysqli_stmt_execute($stmt);

        // Fetching the result as an associative array
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result); // Fetch the whole user info

        mysqli_stmt_close($stmt);

        // Check if user exists
        if ($user) { // If user data is returned
            $_SESSION['user'] = $user; // Store entire user data in session
            $_SESSION['msg'] = 'Login Successful';
            header('Location: http://localhost/codefest_stem/admin'); // Redirect to admin area
            exit();
        } else {
            $errors['login'] = 'Invalid username or password.'; // Error message for invalid credentials
        }
    }
}

ob_end_flush();
?>

<div class="container container-xxl py-5" id="cont">
    <form id="form" method="POST">
        <div style="text-align: center; margin-bottom: 30px;">
            <img src="images/logo.png" alt="" style="width: 150px;">
            <h3 style="color: #fe5d37;">LOGIN</h3>
        </div>
        <?php
        if (isset($errors['login'])) {
            echo "<div class='error-msg'>" . $errors['login'] . "</div>";
        }
        ?>
        <div class="input-container">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" value="<?php echo htmlspecialchars($username, ENT_QUOTES); ?>" class="<?php echo isset($errors['username']) ? 'is-invalid' : ''; ?>">
            <?php echo isset($errors['username']) ? "<div class='invalid-feedback'>" . $errors['username'] . "</div>" : ""; ?>
        </div>
        <div class="input-container">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" class="<?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>">
            <?php echo isset($errors['password']) ? "<div class='invalid-feedback'>" . $errors['password'] . "</div>" : ""; ?>
        </div>
        <div>
            <button class="btn" type="submit">LOGIN</button>
        </div>
    </form>
</div>

<?php include('../partials/footer.php'); ?>