<section>
    <div class="container">
        <article class="blog-post">
            <h1>User Details</h1>
            <h3>First Name: <?= $post['firstname'] ?></h3>
            <p>Last Name: <?= $post['lastname'] ?></p>
            <p>Email: <?= $post['email'] ?></p>
            <div>
                <img src="<?= base_url("assets/img/" . $post['avatar']); ?>" width="150px" height="150px"></img>
            </div>
        </article>
    </div>
</section>

<!-- <?php
        echo "<pre>";
        print_r($post);
        echo "</pre>";
        ?> -->