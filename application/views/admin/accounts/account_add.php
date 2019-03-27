<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add Worker Salary</h3>
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
           
            

            <?php echo form_open(base_url('admin/accounts/add'), 'class="form-horizontal"');  ?> 

            <div class="form-group">
                <label class="col-sm-2 control-label">Select Month</label>

              <div class="col-sm-9">
                <div class="input-group">
                  <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                    <input type="hidden" name="salary_month" id="salary_month">
                    <input type="hidden" name="salary_month_start" id="salary_month_start">
                    <input type="hidden" name="salary_month_end" id="salary_month_end">
                    <span>
                      <i class="fa fa-calendar"></i> Select Month
                    </span>
                    <i class="fa fa-caret-down"></i>
                  </button>
                </div>
              </div>
            </div>

            <div class="form-group">
                <label for="worker_id" class="col-sm-2 control-label">Select Worker</label>

                <div class="col-sm-9">
                  <select name="worker_id" id="worker_id" class="form-control">
                  <option value="">Select Worker</option>
                  <?php foreach($all_workers as $row) { ?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['username'];?></option>
                  <?php } ?>

                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="total_tasks1" class="col-sm-2 control-label">Total Tasks</label>

                <div class="col-sm-9">
                  <input type="text" name="total_tasks1" value="0" class="form-control" disabled="" id="total_tasks1" placeholder="">
                  <input type="hidden" name="total_tasks" value="0" class="form-control" id="total_tasks" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="salary_amount1" class="col-sm-2 control-label">Salary Amount</label>

                <div class="col-sm-9">
                    <input type="text" name="salary_amount1" value="0" class="form-control" disabled="" id="salary_amount1" placeholder="">
                    <input type="hidden" name="salary_amount" value="0" class="form-control" id="salary_amount" placeholder="">
                </div>
              </div>
      
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Add Salary" class="btn btn-info pull-right">
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
$(function () {
    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false,
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
          $('#salary_month_start').val(start.format('YYYY-MM-DD'));
          $('#salary_month_end').val(end.format('YYYY-MM-DD'));
          
        }
    );

    // $('.timepicker').timepicker({ 
    //   showInputs: false,
    //   minuteStep: 60, 
    // }).on('changeTime.timepicker', function(e) { 
    //   if(e.time.value >= "12:00 AM"){ 
    //     alert("This Time is already Selected. "); 
    //   } 
    // });
  });

  $("#add_account").addClass('active');
</script>    

<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url();?>";
 
  $(document).ready(function(){
 
    // Worker change
    $('#worker_id').change(function(){
      var worker_id = $(this).val();
      var salary_month_start = document.getElementById("salary_month_start").value;
      var salary_month_end = document.getElementById("salary_month_end").value;

      //console.log ("salary month start ->" + salary_month_start);
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/accounts/get_tasks_salary/' + worker_id + '/' + salary_month_start + '/' + salary_month_end,
        type: "GET",
        // data: {totaltasks: TotalTasks},
        dataType: 'json',
        error: function() {
                alert('Select Month First then Select Worker...!');
        },
        success: function(data){
          // Remove options 
          // $('#total_tasks').val("dsfas");
          // $('#salary_amount').val("dfsafsadsf");
          //console.log (data[0].TotalEarning);

          // Add options
          // $.each(response,function(data){
            //  $('#total_tasks').val(data['TotalTasks']);
             $('#total_tasks').val(data[0].TotalTasks);
             $('#salary_amount').val(data[0].TotalEarning);
             $('#total_tasks1').val(data[0].TotalTasks);
             $('#salary_amount1').val(data[0].TotalEarning);
          // });
        }
     });
   });
 
 });
 </script>