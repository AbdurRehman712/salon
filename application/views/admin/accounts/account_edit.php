<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Account</h3>
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
           
            <?php echo form_open(base_url('admin/accounts/edit/'.$account['id']), 'class="form-horizontal"' )?> 
            <div class="form-group">
                <label for="worker_id" class="col-sm-2 control-label">Select Worker</label>

                <div class="col-sm-9">
                  <select name="worker_id" class="form-control">
                  <?php foreach($all_workers as $row) { ?>
                    <option value="<?php echo $row['id'];?>" <?php if($row['id'] == $account['worker_id']){ echo 'selected';} ?>><?php echo $row['username'];?></option>
                  <?php } ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2">Select Month</label>

              <div class="col-sm-9">
                <div class="input-group">
                  <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                    <input type="hidden" name="salary_month" id="salary_month" value="<?php echo  $account['salary_month'];?>">
                    <span>
                      <i class="fa fa-calendar"></i> <?php echo  $account['salary_month'];?>
                    </span>
                    <i class="fa fa-caret-down"></i>
                  </button>
                </div>
              </div>
            </div>

            <div class="form-group">
                <label for="total_tasks" class="col-sm-2 control-label">Total Tasks</label>

                <div class="col-sm-9">
                  <input type="text" name="total_tasks" class="form-control" value="<?php echo  $account['total_tasks'];?>" id="total_tasks" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="salary_amount" class="col-sm-2 control-label">Salary Amount</label>

                <div class="col-sm-9">
                    <input type="text" name="salary_amount" class="form-control" value="<?php echo  $account['salary_amount'];?>" id="salary_amount" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Update Account" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 

<script>
$(function () {
      //Timepicker
      $(".timepicker").timepicker({
      showInputs: false
    });

    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
          $('#salary_month').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );
  });
</script>