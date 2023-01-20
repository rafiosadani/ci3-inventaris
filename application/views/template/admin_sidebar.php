<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $user['nama']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
          <li class="active">
            <a href="#">
              <i class="fa fa-dashboard"></i> 
              <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('inventaris'); ?>">
              <i class="fa fa-bank"></i> 
              <span>Inventarisir</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-pencil-square-o"></i>
              <span>Peminjaman</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-calendar-check-o"></i>
              <span>Pengembalian</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-calendar"></i> 
              <span>Generate Laporan</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-table"></i> 
              <span>Management Data</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Pegawai</a>
              </li>
              <li>
                <a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Petugas</a>
              </li>
              <li>
                <a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Jenis</a>
              </li>
              <li>
                <a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Ruang</a>
              </li>
              <li>
                <a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Level</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="<?= base_url('auth/logout'); ?>" onclick="return confirm('Apakah anda yakin ingin keluar?');"><i class="fa fa-sign-out"></i> 
            <span>Logout</span>
            </a>
          </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>