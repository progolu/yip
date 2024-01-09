<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css'); ?>">
    <title>YIP-Ecommerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- link for jquery style -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <div class="container">
                <a class="navbar-brand" href="/yipEcommerce/public">YipEcommerce</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID"
                    aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarID">
                    <div class="navbar-nav">
                        <a class="nav-link active"  href="/yipEcommerce/public">Home</a>
                        
                    </div>
                </div>
                
            </div>
        </nav>

<section class="blog-section">

  <div class="container">
    <p>ADMIN LOGIN</p>
    <?php if ($_POST) : ?>
		<?= \Config\Services::validation()->listErrors(); ?>
	<?php endif; ?>
    <form action="<?= base_url('/admin') ?>" method="post">
      <?= csrf_field(); ?>
      <?php if (!empty(session()->getFlashdata('fail'))) : ?>
        <div class="alert alert-danger">
          <?= session()->getFlashdata('fail') ?>
        </div>
      <?php endif ?>

      <?php if (!empty(session()->getFlashdata('success'))) : ?>
        <div class="alert alert-success">
          <?= session()->getFlashdata('success') ?>
        <?php endif ?>
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" name="email" />
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" name="password" class="form-control" />
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>

        <div>
          <a class="link" href="<?= site_url('admin/register'); ?>">Already have an account, click here to register</a>
        </div>

    </form>
  </div>

</section>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

<!-- Footer -->
<footer class="page-footer font-small teal pt-4">

  <!-- Footer Text -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">



      <hr class="clearfix w-100 d-md-none pb-3">


    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Text -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2024 Copyright: YIPONLINE ECOMMERCE  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</body>
</html>