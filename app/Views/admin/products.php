<section>
    <p>Products</p>
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" id="mydatatable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($news as $newsItem) : ?>
                <tr>
                    <td><?= $newsItem['id'] ?></td>
                    <td><?= $newsItem['pname'] ?></td>
                    <td><?= $newsItem['pdescription'] ?></td>
                    <td><?= $newsItem['pcategory'] ?></td>
                    <td><?= $newsItem['price'] ?></td>
                    <td> <img src="<?= "http://localhost:8080/yipEcommerce/public/assets/img/" . $newsItem['picture']; ?>" width="30px" height="30px"></td>
                    <td>
                        <a href="<?= base_url('admin/edit-product/' . $newsItem['id']) ?>" class="btn btn-success btn-sm">Edit</a>
                        <a href="<?= base_url('admin/delete/' . $newsItem['id']) ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    </div>
</section>