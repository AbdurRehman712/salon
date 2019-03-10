<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Assign New Task</h3>
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
           
            <?php echo form_open(base_url('admin/tasks/assign_add'), 'class="form-horizontal"');  ?> 
              <div class="form-group">
                <label for="task_id" class="col-sm-2 control-label">Select Task</label>

                <div class="col-sm-9">
                  <select name="task_id" class="form-control">

                  <?php foreach($assign_task as $row) { ?>
                    <option value="<?php echo $row['task_id'];?>" <?php if($row['task_id'] == $invoices->customer_id){ echo 'selected';} ?>><?php echo $row['user_name'] . " (". $row['user_email'].")";?></option>
                  <?php } ?>

                    <option value="">Select Task</option>
                    <option value="1">Admin</option>
                    <option value="0">User</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="worker_id" class="col-sm-2 control-label">Select Worker</label>

                <div class="col-sm-9">
                  <select name="worker_id" class="form-control">
                    <option value="">Select Worker</option>
                    <option value="1">Admin</option>
                    <option value="0">User</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="task_date" class="col-sm-2 control-label">Task Date</label>

                <div class="col-sm-9">
                  <input type="date" name="task_date" class="form-control" id="task_date" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="task_status" class="col-sm-2 control-label">Task Status</label>

                <div class="col-sm-9">
                  <select name="task_status" class="form-control">
                    <option value="">Task Status</option>
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
$("#assign_task").addClass('active');
</script>    