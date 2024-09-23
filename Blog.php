<?php

include('./partials/header.php');
require_once('./config/db.php'); // Include the database connection

// Check if blog_id is present in the URL
if (isset($_GET['id'])) {
    $blog_id = mysqli_real_escape_string($conn, $_GET['id']); // Sanitize the blog ID

    // Fetch the blog with the provided blog_id
    require_once('./config/db.php');
    $sql = "SELECT * FROM blogs WHERE blog_id = '$blog_id' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Get the blog data
        $blog = mysqli_fetch_assoc($result);
        $blog_title = $blog['blog_title'];
        $blog_image = base64_encode($blog['blog_image']); // Convert image binary to base64
        $blog_content = $blog['blog_content']; // Content from WYSIWYG editor
        $created_at = $blog['created_at'];
    } else {
        // Redirect to all blogs page or show a 404 message if blog not found
        header("Location: all_blogs.php");
        exit();
    }

    // Close database connection
    mysqli_close($conn);
} else {
    // Redirect if no blog_id is present in the URL
    header("Location: all_blogs.php");
    exit();
}
?>

<!-- Blog Detail Header -->
<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4"><?= htmlspecialchars($blog_title); ?></h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="all_blogs.php">All Blogs</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page"><?= htmlspecialchars($blog_title); ?></li>
            </ol>
        </nav>
    </div>
</div>
<!-- Blog Detail Header End -->

<!-- Blog Detail Content Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- Blog Image -->
                <img src="data:image/jpeg;base64,<?= $blog_image; ?>" class="img-fluid mb-4" alt="<?= htmlspecialchars($blog_title); ?>">

                <!-- Blog Content -->
                <p><strong>Published on:</strong> <?= date('F j, Y', strtotime($created_at)); ?></p>

                <!-- Parsing WYSIWYG HTML content -->
                <div><?= $blog_content; // Display HTML content directly without escaping 
                        ?></div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Detail Content End -->

<?php include('./partials/footer.php'); ?>