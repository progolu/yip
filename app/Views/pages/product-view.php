<section>
    <div class="container">
        <article class="blog-post">
            <h1>Product Details</h1>
            <h3>Product Name: <?= $post['pname'] ?></h3>
            <p>Product Description: <?= $post['pdescription'] ?></p>

            <p>Product Category: <?= $post['pcategory'] ?></p>

            <p>Product Price: <?= $post['price'] ?></p>
            <div>
                <img src="<?= base_url("assets/img/" . $post['picture']); ?>" width="150px" height="150px"></img>
            </div>
        </article>
        <article class="blog-post">
        <div class="text-center container py-5">
                <h4 class="mt-4 mb-5"><strong>Related Product</strong></h4>
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
        </article>
    </div>
</section>

<!-- <?php
        echo "<pre>";
        print_r($post);
        echo "</pre>";
        ?> -->