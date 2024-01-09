<div class="header py-3 text-center">
    <h3>
        <div class="text-bg-danger p-3">
            Add Products
        </div>
    </h3>
</div>
<section>
<?php if ($_POST) : ?>
		<?= \Config\Services::validation()->listErrors(); ?>
	<?php endif; ?>
<form action="<?= base_url('admin/add-product') ?>" method="post" enctype="multipart/form-data">
   <?= csrf_field(); ?>
  <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                        <?= session()->getFlashdata('fail') ?>
                <?php endif ?>
                <?php if (!empty(session()->getFlashdata('success'))) : ?>

                        <?= session()->getFlashdata('success') ?>
      
                <?php endif ?> 
        <div class="form-group">
            <label> Product Name</label>
            <input class="form-control" type="text" name="pname" required />
            <span class="field-validation-valid">
              <?= isset($validation) ? display_error($validation, 'pname') : '' ?>
            </span>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" rows="3" name="pdescription"></textarea>
            <span class="field-validation-valid">
              <?= isset($validation) ? display_error($validation, 'pdescription') : '' ?>
            </span>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select class="form-select" name="pcategory" aria-label="Default select example">
                <option selected>Select Category</option>
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
            <input class="form-control" type="text" name="price" required />
            <span class="field-validation-valid">
              <?= isset($validation) ? display_error($validation, 'price') : '' ?>
            </span>
        </div>
        <div class='form-group'>
			<label>Product Picture</label>
			<input type='file' name='picture' class='form-control'>
            <span class="field-validation-valid">
              <?= isset($validation) ? display_error($validation, 'picture') : '' ?>
            </span>
		</div>
        <div>
            <p></p>
        </div>

        <div class="container">

            <button type="submit" class="btn btn-primary">Add Product </button>

        </div>
        <div>
            <p></p>
        </div>
    </form>

</section>