<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Assign Task</h3>
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
           
            <?php echo form_open(base_url('admin/tasks/assign_edit/'.$assign_task['id']), 'class="form-horizontal"' )?> 
            <div class="form-group">
                <label for="task_id" class="col-sm-2 control-label">Select Task</label>

                <div class="col-sm-9">
                  <select name="task_id" class="form-control">
                    <option value="">Select Task</option>
                    <option value="1" <?= ($assign_task['task_id'] == 1)?'selected': '' ?> >Admin</option>
                    <option value="0" <?= ($assign_task['task_id'] == 0)?'selected': '' ?>>User</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="worker_id" class="col-sm-2 control-label">Select Worker</label>

                <div class="col-sm-9">
                  <select name="worker_id" class="form-control">
                    <option value="">Select Worker</option>
                    <option value="1" <?= ($assign_task['worker_id'] == 1)?'selected': '' ?> >Admin</option>
                    <option value="0" <?= ($assign_task['worker_id'] == 0)?'selected': '' ?>>User</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="task_date" class="col-sm-2 control-label">Task Date</label>

                <div class="col-sm-9">

                  <?php 
                      $originalDate = $assign_task['task_date'];
                      $newDate = date("Y-m-d", strtotime($originalDate));
                  ?>
                  <input type="date" name="task_date" value="<?= $newDate; ?>" class="form-control" id="task_date">
                </div>
              </div>

              <div class="form-group">
                <label for="task_status" class="col-sm-2 control-label">Task Status</label>

                <div class="col-sm-9">
                  <select name="task_status" class="form-control">
                    <option value="">Task Status</option>
                    <option value="1" <?= ($assign_task['task_status'] == 1)?'selected': '' ?> >Completed</option>
                    <option value="0" <?= ($assign_task['task_status'] == 0)?'selected': '' ?>>Not Completed</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Update Assign Task" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 