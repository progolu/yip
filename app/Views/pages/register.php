<section class="blog-section">
    <div class="container">
        <p>REGISTER</p>
        <?php if ($_POST) : ?>
		<?= \Config\Services::validation()->listErrors(); ?>
	<?php endif; ?>
        <form action="<?= base_url('pages/register') ?>" method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <!-- <?= csrf_field(); ?>
                <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('fail') ?>
                    </div>
                <?php endif ?>

                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif ?> -->
                <label class="col-sm-2 col-form-label">First Name</label>
                <div class="col-sm-10">
                    <input type="text" name="firstname" class="form-control" />

                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                    <input type="text" name="lastname"class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email"  class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password"class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="password" name="cpassword" class="form-control">
                </div>
            </div>
            <div class='form-group'>
			<label>Upload Image</label>
			<input type='file' name='avatar' class='form-control'>
		</div>
            <button type="submit" class="btn btn-primary">Sign Up</button>

            <div>
                <a class="link" id="login" href="<?= site_url('pages/login'); ?>">Already have an account, click here to login</a>
            </div>

        </form>
    </div>

</section>