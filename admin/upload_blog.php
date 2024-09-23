<?php

ob_start();
// Ensure session is started if not already
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('admincheck.php');
include('../partials/header.php');
require_once('../config/db.php');
require_once('../config/random_id.php');

$blogTitle = $blogContent = '';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    // Sanitize input
    $blogTitle = trim($_POST['blogTitle']);
    $blogContent = trim($_POST['blogContent']); // TinyMCE content including image data

    // Validate blog title
    if (empty($blogTitle)) {
        $errors['blogTitle'] = 'Blog title is required.';
    }

    // Validate blog content
    if (empty($blogContent)) {
        $errors['blogContent'] = 'Blog content is required.';
    }

    // Validate blog image
    if (isset($_FILES['blogImage']) && $_FILES['blogImage']['error'] === UPLOAD_ERR_OK) {
        // Validate image type
        $blogImage = $_FILES['blogImage'];
        $imageType = strtolower(pathinfo($blogImage['name'], PATHINFO_EXTENSION));
        $allowedTypes = ['jpeg', 'jpg', 'png', 'webp'];

        if (!in_array($imageType, $allowedTypes)) {
            $errors['blogImage'] = 'Invalid image type. Only JPEG, PNG, and WEBP are allowed.';
        }
    } else {
        $errors['blogImage'] = 'Blog image is required.';
    }

    // If no errors, proceed to database insert
    if (empty($errors)) {
        $blogId = random_id();
        $dateUploaded = date('Y-m-d H:i:s');

        // Read the image content as a binary string
        $imageContent = file_get_contents($blogImage['tmp_name']);

        // Prepare the SQL statement with placeholders
        $stmt = mysqli_prepare($conn, "INSERT INTO blogs (blog_id, blog_title, blog_content, blog_image, created_at) VALUES (?, ?, ?, ?, ?)");

        // Bind parameters (using 'b' for binary blob for image and 's' for strings)
        mysqli_stmt_bind_param($stmt, 'sssss', $blogId, $blogTitle, $blogContent, $imageContent, $dateUploaded);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['msg'] = 'Blog uploaded successfully.';
            header('Location: http://localhost/codefest_stem/admin');
            exit();
        } else {
            $errors['db'] = 'There was an error uploading the blog. Please try again.';
        }

        // Close the statement
        mysqli_stmt_close($stmt);
        // Close the database connection
        mysqli_close($conn);
    }
}

ob_end_flush();
?>

<div class="container container-xxl py-5" id="cont">

    <?php include('../partials/sidebar.php'); ?>

    <div class="content">
        <button id="menuBtn" class="menu-btn">&#9776;</button>
        <h2 class="h2"></h2>
    </div>

    <form id="form" method="POST" enctype="multipart/form-data">
        <div style="text-align: center; margin-bottom: 30px;">
            <img src="images/logo.png" alt="" style="width: 150px;">
            <h3 style="color:  #fe5d37;">UPLOAD BLOG</h3>
        </div>
        <?php
        if (isset($_SESSION['msg'])) {
            echo "<div class='success-msg'>" . $_SESSION['msg'] . "</div>";
            unset($_SESSION['msg']); // Clear the message after displaying it
        }
        ?>
        <?php echo isset($errors['db']) ? "<div class='error'>" . $errors['db'] . "</div>" : ""; ?>
        <div class="input-container">
            <label for="blogTitle" class="form-label">Blog Title</label>
            <input type="text" id="blogTitle" placeholder="Enter blog title" name="blogTitle" value="<?php echo htmlspecialchars($blogTitle, ENT_QUOTES); ?>" class="<?php echo isset($errors['blogTitle']) ? 'is-invalid' : ''; ?>">
            <?php echo isset($errors['blogTitle']) ? "<div class='invalid-feedback'>" . $errors['blogTitle'] . "</div>" : ""; ?>
        </div>
        <div class="input-container">
            <label for="blogImage" class="form-label">Featured Image</label>
            <input type="file" id="blogImage" name="blogImage" class="<?php echo isset($errors['blogImage']) ? 'is-invalid' : ''; ?>">
            <?php echo isset($errors['blogImage']) ? "<div class='invalid-feedback'>" . $errors['blogImage'] . "</div>" : ""; ?>
        </div>
        <div class="input-container">
            <label for="blogContent" class="form-label">Blog Content</label>
            <textarea id="blogContent" placeholder="Enter blog content" name="blogContent" class="<?php echo isset($errors['blogContent']) ? 'is-invalid' : ''; ?>" style='height: 500px;'><?php echo htmlspecialchars($blogContent, ENT_QUOTES); ?></textarea>
            <?php echo isset($errors['blogContent']) ? "<div class='invalid-feedback'>" . $errors['blogContent'] . "</div>" : ""; ?>
        </div>
        <div>
            <button class="btn" type="submit">UPLOAD BLOG</button>
        </div>
    </form>
</div>

<?php include('../partials/footer.php'); ?>

<script src="https://cdn.tiny.cloud/1/v3df6xj5kt2jdt5bv9dxda914rceqqty9fzgtd2z60kghlkg/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#blogContent',
        plugins: 'link image code lists blockquote iframe',
        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent blockquote | link image | code | iframe',
        menubar: false,
        height: 500,
        automatic_uploads: true,
    });
</script>