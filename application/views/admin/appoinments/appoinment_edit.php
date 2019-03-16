<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Appoinment</h3>
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
           
            <?php echo form_open(base_url('admin/appoinments/edit/'.$appoinment['id']), 'class="form-horizontal"' )?> 
            <div class="form-group">
                <label for="product_id" class="col-sm-2 control-label">Select Product</label>

                <div class="col-sm-9">
                  <select name="product_id" class="form-control">
                  <?php foreach($product as $row) { ?>
                    <option value="<?php echo $row['id'];?>" <?php if($row['id'] == $appoinment['product_id']){ echo 'selected';} ?>><?php echo $row['product_name'];?></option>
                  <?php } ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="customer_id" class="col-sm-2 control-label">Select Customer</label>

                <div class="col-sm-9">
                  <select name="customer_id" class="form-control">
                  <?php foreach($all_customers as $row) { ?>
                    <option value="<?php echo $row['id'];?>" <?php if($row['id'] == $appoinment['customer_id']){ echo 'selected';} ?>><?php echo $row['username'];?></option>
                  <?php } ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="appoinment_date" class="col-sm-2 control-label">Appoinment Date</label>

                <div class="col-sm-9">

                  <?php 
                      $originalDate = $appoinment['appoinment_date'];
                      $newDate = date("Y-m-d", strtotime($originalDate));
                  ?>
                  <input type="date" name="appoinment_date" value="<?= $newDate; ?>" class="form-control" id="appoinment_date">
                </div>
              </div>

              <div class="form-group">
                <label for="appoinment_time" class="col-sm-2 control-label">Appoinment Time</label>

                <div class="col-sm-9">

                  <?php 
                      $originalDate = $appoinment['appoinment_time'];
                      $newTime = date("H:i", strtotime($originalDate));
                  ?>
                  <input type="time" name="appoinment_time" value="<?= $newTime; ?>" class="form-control" id="appoinment_time">
                </div>
              </div>

              <div class="form-group">
                <label for="comments" class="col-sm-2 control-label">Comments & Questions</label>

                <div class="col-sm-9">
                  <textarea type="time" name="comments" class="form-control" id="comments" placeholder="Enter comments or questions"><?= $appoinment['comments']?></textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="appoinment_status" class="col-sm-2 control-label">Appoinment Status</label>

                <div class="col-sm-9">
                  <select name="appoinment_status" class="form-control">
                    <option value="1" <?= ($appoinment['appoinment_status'] == 1)?'selected': '' ?> >Completed</option>
                    <option value="0" <?= ($appoinment['appoinment_status'] == 0)?'selected': '' ?>>Not Completed</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Update Appoinment" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 