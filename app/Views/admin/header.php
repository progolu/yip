<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>YIP-Ecommerce Admin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="public/style.css" rel="stylesheet">
    <link href="assets/css/nav.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />

    <link rel="stylesheet" href="  https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" >
    <link rel="stylesheet" href="   https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" >

    



</head>


<body>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        // let table = new DataTable('#mydatatable');
        $(document).ready(function() {
            $('#mydatatable').DataTable();
        });
    </script>
    <div class="main-container d-flex">
        <div class="sidebar col-lg-4 col-md-6" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
                <h1 class="fs-4"> <span class="bg-white text-danger rounded shadow px-2 me-2">YIP-</span>Ecommerce Admin
                </h1>
            </div>
            <ul class="list-unstyle px-2">
                <li class="active"><a href="<?= site_url('admin/index'); ?>" class="text-decoration-none px-3 py-2 d-block">Dashboard</a></li>
                <li class=""><a href="<?= site_url('admin/users'); ?>" class="text-decoration-none  px-3 py-2 d-block">Users</a></li>
                <li class=""><a href="<?= site_url('admin/add-product'); ?>" class="text-decoration-none  px-3 py-2 d-block">Add Products</a></li>
                <li class=""><a href="<?= site_url('admin/products'); ?>" class="text-decoration-none  px-3 py-2 d-block">Products</a></li>
                <li class=""><a href="<?= site_url('admin/orders'); ?>" class="text-decoration-none  px-3 py-2 d-block">Orders</a></li>
            </ul>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <h4><span class="bg-white text-danger rounded shadow px-2">
                                Welcome
                            </span>Admin Dashboard</h4>
                        <button class="btn px-1 py-0 text-white open-btn"> &#8801;</button>
                    </div>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Account
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="<?= site_url('profile'); ?>">Profile</a></li>
                                    <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="<?= site_url('admin/logout'); ?>">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="dashboard-content">
                <div class="content px-3 pt-4">
                    <div class="row justify-content-between">
                    </div>