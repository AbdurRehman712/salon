<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Task</h3>
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
           
            <?php echo form_open(base_url('admin/tasks/edit/'.$task['id']), 'class="form-horizontal"' )?> 
              <div class="form-group">
                <label for="task_name" class="col-sm-2 control-label">Task Name</label>

                <div class="col-sm-9">
                  <input type="text" name="task_name" value="<?= $task['task_name']; ?>" class="form-control" id="task_name" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="task_description" class="col-sm-2 control-label">Task Description</label>

                <div class="col-sm-9">
                  <input type="text" name="task_description" value="<?= $task['task_description']; ?>" class="form-control" id="task_description" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="task_price" class="col-sm-2 control-label">Task Price</label>

                <div class="col-sm-9">
                  <input type="number" name="task_price" value="<?= $task['task_price']; ?>" class="form-control" id="task_price" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Update Task" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 