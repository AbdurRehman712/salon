<?php 
$cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);  
?>  

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url() ?>public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= ucwords($this->session->userdata('name')); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li id="dashboard" class="treeview">
          <a href="<?= base_url('admin/dashboard'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
      </ul>

      <ul class="sidebar-menu">
        <li id="users" class="treeview">
            <a href="#">
              <i class="fa fa-users"></i> <span>Customers</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id="add_user"><a href="<?= base_url('admin/users/add'); ?>"><i class="fa fa-circle-o"></i> Add Customer</a></li>
              <li id="view_users" class=""><a href="<?= base_url('admin/users'); ?>"><i class="fa fa-circle-o"></i> View Customers</a></li>
            </ul>
          </li>
          <li id="products" class="treeview">
            <a href="#">
              <i class="fa fa-cubes"></i> <span>Products</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id="add_product"><a href="<?= base_url('admin/products/add'); ?>"><i class="fa fa-circle-o"></i> Add Product</a></li>
              <li id="view_products" class=""><a href="<?= base_url('admin/products'); ?>"><i class="fa fa-circle-o"></i> View Products</a></li>
            </ul>
          </li>
          <li id="tasks" class="treeview">
            <a href="#">
              <i class="fa fa-tasks"></i> <span>Tasks</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id="add_task"><a href="<?= base_url('admin/tasks/add'); ?>"><i class="fa fa-circle-o"></i> Add Task</a></li>
              <li id="view_tasks" class=""><a href="<?= base_url('admin/tasks'); ?>"><i class="fa fa-circle-o"></i> View Tasks</a></li>
              <li id="assign_task"><a href="<?= base_url('admin/tasks/assign_add'); ?>"><i class="fa fa-circle-o"></i> Assign Task</a></li>
              <li id="view_assign_tasks" class=""><a href="<?= base_url('admin/tasks/assign'); ?>"><i class="fa fa-circle-o"></i> View Assign Tasks</a></li>
            </ul>
          </li>
          <li id="appoinments" class="treeview">
            <a href="#">
              <i class="fa fa-calendar-check-o"></i> <span>Appoinments</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id="add_appoinment"><a href="<?= base_url('admin/appoinments/add'); ?>"><i class="fa fa-circle-o"></i> Add Appoinment</a></li>
              <li id="view_appoinments" class=""><a href="<?= base_url('admin/appoinments'); ?>"><i class="fa fa-circle-o"></i> View Appoinments</a></li>
            </ul>
          </li>
          <li id="accounts" class="treeview">
            <a href="#">
              <i class="fa fa-money"></i> <span>Accounts</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id="add_account"><a href="<?= base_url('admin/accounts/add'); ?>"><i class="fa fa-circle-o"></i> Add Account</a></li>
              <li id="view_accounts" class=""><a href="<?= base_url('admin/accounts'); ?>"><i class="fa fa-circle-o"></i> View Accounts</a></li>
            </ul>
          </li>

      </ul>


    </section>
    <!-- /.sidebar -->
  </aside>

  
<script>
  $("#<?= $cur_tab; ?>").addClass('active');
</script>
