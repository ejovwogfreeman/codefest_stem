<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Codefest STEM</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <?php
    // Get the current URL
    $current_url = $_SERVER['REQUEST_URI'];

    // Check if 'admin' is in the URL
    if (strpos($current_url, 'admin') !== false) {
        echo '<link href="../css/style.css" rel="stylesheet">';
    } else {
        echo '<link href="css/style.css" rel="stylesheet">';
    }
    ?>

</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0" style="background-color: red;">
            <a href="/" class="navbar-brand">
                <img src="img/logo.png" alt="" width="200px">
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="/" class="nav-item nav-link active">Home</a>
                    <!-- <a href="about" class="nav-item nav-link">About Us</a> -->
                    <!-- <a href="classes" class="nav-item nav-link">Classes</a> -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Sections</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="#about_us" class="dropdown-item">About Us</a>
                            <a href="#school_facilities" class="dropdown-item">School Facilities</a>
                            <!-- <a href="#become_a_teacher" class="dropdown-item">Become A Teachers</a> -->
                            <a href="#school_classes" class="dropdown-item">School Classes</a>
                            <!-- <a href="#make_appointment" class="dropdown-item">Make Appointment</a> -->
                            <a href="#our_team" class="dropdown-item">Our Team</a>
                            <a href="#client_testimonials" class="dropdown-item">Cleint Testimonials</a>
                            <a href="#contact_us" class="dropdown-item">Contact Us</a>
                        </div>
                    </div>
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Programs</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="https://forms.gle/hxB8WLZ6zCbyyYfC7" target="_blank" class="dropdown-item">Summer Bootcamp</a>
                        </div>
                    </div> -->
                    <a href="blogs" class="nav-item nav-link">Blogs</a>
                    <!-- <a href="schools" class="btn btn-primary rounded-pill px-3 d-block d-lg-none">School Partnering With Us<i class="fa fa-arrow-right ms-3"></i></a> -->
                    <a href="bootcamp" class="btn btn-primary rounded-pill px-3 d-block d-lg-none">Summer Bootcamp<i class="fa fa-arrow-right ms-3"></i></a>
                </div>
                <!-- <a href="schools" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">School Partnering With Us<i class="fa fa-arrow-right ms-3"></i></a> -->
                <a href="bootcamp" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Summer Bootcamp<i class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>
        <!-- Navbar End -->