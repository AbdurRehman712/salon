<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Product</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-body">
          <?php if(isset($msg) || validation_errors() !== ''): ?>
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                  <?= validation_errors();?>
                  <?= isset($msg)? $msg: ''; ?>
              </div>
            <?php endif; ?>
           
            <?php echo form_open(base_url('admin/products/edit/'.$product['id']), 'class="form-horizontal"' )?> 
              <div class="form-group">
                <label for="product_name" class="col-sm-2 control-label">Product Name</label>

                <div class="col-sm-9">
                  <input type="text" name="product_name" value="<?= $product['product_name']; ?>" class="form-control" id="product_name" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="product_description" class="col-sm-2 control-label">Product Description</label>

                <div class="col-sm-9">
                  <input type="text" name="product_description" value="<?= $product['product_description']; ?>" class="form-control" id="product_description" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="product_price" class="col-sm-2 control-label">Product Price</label>

                <div class="col-sm-9">
                  <input type="number" name="product_price" value="<?= $product['product_price']; ?>" class="form-control" id="product_price" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="product_stock" class="col-sm-2 control-label">Product Stock</label>

                <div class="col-sm-9">
                  <input type="number" name="product_stock" value="<?= $product['product_stock']; ?>" class="form-control" id="product_stock" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Update Product" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 