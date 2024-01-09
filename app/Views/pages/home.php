<section>
    <?php
    $session = \Config\Services::session();
    ?>
    <?php if (isset($session->success)) : ?>
        <div class="alert alert-success text-center alert-dismissible fade show mb-0" role="0">
            <?= $session->success ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#777" />
                </svg>

                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1>Example headline.</h1>
                        <p>Some representative placeholder content for the first slide of the carousel.</p>
                        <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#777" />
                </svg>

                <div class="container">
                    <div class="carousel-caption">
                        <h1>Another example headline.</h1>
                        <p>Some representative placeholder content for the second slide of the carousel.</p>
                        <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#777" />
                </svg>

                <div class="container">
                    <div class="carousel-caption text-end">
                        <h1>One more for good measure.</h1>
                        <p>Some representative placeholder content for the third slide of this carousel.</p>
                        <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <section class="blog-section">
        <section style="background-color: #eee;">
            <div class="text-center container py-5">
                <h4 class="mt-4 mb-5"><strong>Bestsellers</strong></h4>
                <div class="row">
                    <?php if ($news) : ?>
                        <?php foreach ($news as $newsItem) : ?>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card" style="width: 18rem;">
                                <a href="/yipEcommerce/public/page/<?= $newsItem['slug'] ?>">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <img src="<?= "http://localhost:8080/yipEcommerce/public/assets/img/" . $newsItem['picture']; ?>" width="100%" height="200px"></img>
                                            <h5 class="card-title"><a href="/yipEcommerce/public/page/<?= $newsItem['slug'] ?>"><?= $newsItem['pname'] ?></a></h5>
                                            <p class="card-text"><?= $newsItem['pdescription'] ?></p>
                                            <p class="card-text"><?= $newsItem['pcategory'] ?></p>
                                            <h6 class="mb-3">N <?= $newsItem['price'] ?></h6>
                                            
            <button type="submit" class="btn btn-primary">Add to cart </button>
                                    </div>
                                   </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class="text-center">No posts have been found</p>
                    <?php endif; ?>
                </div>


            </div>
        </section>



    </section>