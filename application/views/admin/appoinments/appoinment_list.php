 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">All Appoinmnets</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>Product Name</th>
          <th>Customer Name</th>
          <th>Appoinment Date</th>
          <th>Appoinment Time</th>
          <th>Comments</th>
          <th>Appoinment Status</th>
          <th style="width: 150px;" class="text-right">Option</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach($all_appoinments as $row): ?>
          <tr>
            <td><?= $row['product_id']; ?></td>
            <td><?= $row['customer_id']; ?></td>
            <td><?= $row['appoinment_date']; ?></td>
            <?php 
                $originalDate = $row['appoinment_time'];
                $newTime = date("h:i A", strtotime($originalDate));
            ?>
            <td><?= $newTime ?></td>
            <td><?= $row['comments']; ?></td>
            <td>
              <span class="btn btn-primary btn-flat btn-xs">
                <?php
                 if($row['appoinment_status'] == 0) {echo 'Not Commpleted';} 
                 else{echo 'Completed';} 
                ?>
              <span>
            </td>
            <td class="text-right"><a href="<?= base_url('admin/appoinments/edit/'.$row['id']); ?>" class="btn btn-info btn-flat">Edit</a><a href="<?= base_url('admin/appoinments/del/'.$row['id']); ?>" class="btn btn-danger btn-flat">Delete</a></td>
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
$("#view_appoinments").addClass('active');
</script>        
