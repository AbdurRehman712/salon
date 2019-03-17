 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">All Accounts</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>Worer Name</th>
          <th>Total Tasks</th>
          <th>Salary Month</th>
          <th>Salary Amount</th>
          <th style="width: 150px;" class="text-right">Option</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach($all_accounts as $row): ?>
          <tr>
            <td><?= $row['worker_id']; ?></td>
            <td><?= $row['total_tasks']; ?></td>
            <td><?= $row['salary_month']; ?></td>
            <td><?= $row['salary_amount']; ?></td>
            <td class="text-right"><a href="<?= base_url('admin/accounts/edit/'.$row['id']); ?>" class="btn btn-info btn-flat">Edit</a><a href="<?= base_url('admin/accounts/del/'.$row['id']); ?>" class="btn btn-danger btn-flat">Delete</a></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
       
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>  

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script> 
<script>
$("#view_accounts").addClass('active');
</script>        