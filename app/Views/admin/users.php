<section>
    <p>Users</p>
    <table class="table bordered" id="mydatatable">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($news as $newsItem) : ?>
                <tr>
                    <td><?= $newsItem['id'] ?></td>
                    <td><?= $newsItem['firstname'] ?></td>
                    <td><?= $newsItem['lastname'] ?></td>
                    <td><?= $newsItem['email'] ?></td>
                    <td> <img src="<?= "http://localhost:8080/yipEcommerce/public/assets/img/" . $newsItem['avatar']; ?>" width="30px" height="30px"></td>
                    <td> <a href="<?= base_url('user-view/' . $newsItem['slug']) ?>" class="btn btn-success btn-sm">View</a>
                        <a href="<?= base_url('admin/user/' . $newsItem['id']) ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    </div>
</section>