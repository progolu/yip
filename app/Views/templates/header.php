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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/country-region-dropdown-menu/2.3.1/js/geodatasource-cr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/country-region-dropdown-menu/2.3.1/css/geodatasource-countryflag.min.css"> -->


        <!-- link for bootstrap style -->
    

        <!-- <script src="<?= base_url('assets/js/geodatasource-cr.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/en_only/geodatasource-cr.min.js'); ?>"></script>
     
        <link rel="stylesheet" href=" <?= base_url('assets/css/geodatasource-countryflag.css'); ?>">
        <link rel="stylesheet" href=" <?= base_url('assets/css/geodatasource.css'); ?>">
       
        <link href="https://fonts.googleapis.com/css?family=Strait|Chonburi" rel="stylesheet">


        <script type="text/javascript" src="?= base_url('assets/js/Gettext.js'); ?><"></script> -->
 

        <!-- <script type="text/javascript">
            $(document).ready(function() {
                $("#gds-cr-one").on('change',function() {
                    $("#display").html("You have selected " + $("#countrySelection").children("option").filter(":selected").text() + " > " + $(this).children("option").filter(":selected").text());
                });
            });
        </script> -->
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
                        <!-- <a class="nav-link active"  href="/uframe/public/blog/view">View Post </a> -->
                        <a class="nav-link active"  href="/yipEcommerce/public/pages/about">About </a>
                        <a class="nav-link active"  href="/yipEcommerce/public/pages/login">Login </a>

                        <a class="nav-link active"  href="/yipEcommerce/public/admin/login">Admin Login </a>
       
                        
                    </div>
                </div>
                
            </div>
        </nav>
