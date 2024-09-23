<?php

include('./partials/header.php');
require_once('./config/db.php'); // Include the database connection

// Query to fetch all columns from the blogs table
$sql = "SELECT * FROM blogs ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

$blogs = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Add each blog's details into the blogs array
        $blogs[] = [
            'blog_id' => $row['blog_id'],
            'blog_title' => $row['blog_title'],
            'blog_image' => base64_encode($row['blog_image']) // Convert binary data to base64 for displaying the image
            // Add other fields as needed from your database structure, e.g. 'blog_content'
        ];
    }
} else {
    $blogs = null; // No blogs found
}

// Close the database connection
mysqli_close($conn);
?>

<!-- Page Header -->
<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">All Blogs</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Blogs</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Blogs Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row">
            <?php if ($blogs): ?>
                <?php foreach ($blogs as $blog): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <!-- Blog Image -->
                            <img src="data:image/jpeg;base64,<?= $blog['blog_image']; ?>" class="card-img-top" style="height: 300px; width: 100%; object-fit: cover; border: 1px solid rgba(0,0,0,0.1)" alt="<?= htmlspecialchars($blog['blog_title']); ?>" />

                            <!-- Blog Content (Title and Read More Link) -->
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($blog['blog_title']); ?></h5>
                                <a href="blog?id=<?= urlencode($blog['blog_id']); ?>" class="btn btn-primary">Read Blog</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No blogs found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Blogs End -->

<?php include('./partials/footer.php'); ?>