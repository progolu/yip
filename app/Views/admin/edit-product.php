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

</head>


<body>
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
                                <a class="nav-link active" aria-current="page" href="<?= site_url('login'); ?>">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="dashboard-content">
                <div class="content px-3 pt-4">
                    <div class="row justify-content-between">
                    </div>

                    <div class="container">
                        <h1>Edit Product</h1>
                        <?php if ($_POST) : ?>
                            <?= \Config\Services::validation()->listErrors(); ?>
                        <?php endif; ?>
                        <form action="<?= base_url('admin/edit-product/' . $products['id']) ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
            <label> Product Name</label>
            <input class="form-control" type="text" name="pname" value="<?= $products['pname'] ?>" required />
            <span class="field-validation-valid">
              <?= isset($validation) ? display_error($validation, 'pname') : '' ?>
            </span>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" rows="3" name="pdescription" <?= $products['pdescription'] ?>>
            <?php echo $products['pdescription']; ?>
            </textarea>
            <span class="field-validation-valid">
              <?= isset($validation) ? display_error($validation, 'pdescription') : '' ?>
            </span>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select class="form-select" name="pcategory" value="<?= $products['pcategory'] ?>" aria-label="Default select example">
                <option selected><?= $products['pcategory'] ?></option>
                <option value="Electronics">Electronics</option>
                <option value="Home Appliance">Home Appliance</option>
                <option value="Fashion">Fashion</option>
            </select>
            <span class="field-validation-valid">
              <?= isset($validation) ? display_error($validation, 'pcategory') : '' ?>
            </span>
        </div>
        <div class="form-group">
            <label>Amount</label>
            <input class="form-control" type="text" name="price" value="<?= $products['price'] ?>"  required />
            <span class="field-validation-valid">
              <?= isset($validation) ? display_error($validation, 'price') : '' ?>
            </span>
        </div>
                            <div class='form-group'>
                                <label>Upload Image</label>
                                <input type='file' name='picture' class='form-control'>
                            </div>
                            <div class="mb-3">
                                <img src="<?= base_url('assets/img/' . $products['picture']) ?>" class="w-100" width="100px" height="100px" alt="image" />

                            </div>


                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
    </div>
    </div>
    </div>
    </div>


    </div>


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min-js"></script>
    <script>
        $(".sidebar ul li").on('click', function() {
            $(".sidebar ul li.active").removeClass('active');
            $(this).addClass('active');
        })

        $(".open-btn").on('click', function() {
            $(this).addClass('active');
        });
    </script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>