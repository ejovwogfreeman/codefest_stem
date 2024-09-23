<?php
// Start the session
session_start();

// Include your database connection
require_once('../config/db.php');

// Check if the blog ID is provided
if (isset($_GET['id'])) {
    $blogId = $_GET['id'];

    // Prepare the SQL DELETE statement
    $stmt = mysqli_prepare($conn, "DELETE FROM blogs WHERE blog_id = ?"); // Replace 'id' with your actual primary key column name

    // Bind the parameter
    mysqli_stmt_bind_param($stmt, 's', $blogId); // Assuming the ID is a string. Change to 'i' if it's an integer.

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Set success message in session
        $_SESSION['msg'] = 'Blog deleted successfully!';
        // Redirect to blog list page
        header('Location: http://localhost/codefest_stem/admin'); // Change to your blog list page URL
        exit();
    } else {
        // Set error message in session if execution fails
        $_SESSION['error'] = 'Error: ' . mysqli_error($conn);
        header('Location: http://localhost/codefest_stem/blogs'); // Redirect back to the blog list page
        exit();
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Set error message if no ID is provided
    $_SESSION['error'] = 'No blog ID provided.';
    header('Location: http://localhost/codefest_stem/blogs'); // Redirect back to the blog list page
    exit();
}

// Close the database connection
mysqli_close($conn);
