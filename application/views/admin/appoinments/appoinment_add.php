<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Appoinment</h3>
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
           
            <?php echo form_open(base_url('admin/appoinments/add'), 'class="form-horizontal"');  ?> 
              <div class="form-group">
                <label for="product_id" class="col-sm-2 control-label">Select Product</label>

                <div class="col-sm-9">
                  <select name="product_id" class="form-control">
                  <option value="">Select Product</option>
                  <?php foreach($product as $row) { ?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['product_name'];?></option>
                  <?php } ?>

                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="customer_id" class="col-sm-2 control-label">Select Customer</label>

                <div class="col-sm-9">
                  <select name="customer_id" class="form-control">
                  <option value="">Select Customer</option>
                  <?php foreach($all_customers as $row) { ?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['username'];?></option>
                  <?php } ?>
                
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="appoinment_date" class="col-sm-2 control-label">Appointment Date</label>

                <div class="col-sm-9">
                  <input type="date" name="appoinment_date" class="form-control" id="appoinment_date" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="appoinment_time" class="col-sm-2 control-label">Appointment Time</label>

                <div class="col-sm-9">
                  <input type="time" name="appoinment_time" class="form-control" id="appoinment_time" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="comments" class="col-sm-2 control-label">Comments & Questions</label>

                <div class="col-sm-9">
                  <textarea type="time" name="comments" class="form-control" id="comments" placeholder="Enter comments or questions"></textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="appoinment_status" class="col-sm-2 control-label">Appointment Status</label>

                <div class="col-sm-9">
                  <select name="appoinment_status" class="form-control">
                    <option value="">Appointment Status</option>
                    <option value="1">Completed</option>
                    <option value="0">Not Completed</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Add Task" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 


<script>
$("#add_appoinment").addClass('active');
</script>    