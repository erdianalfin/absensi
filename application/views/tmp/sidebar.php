
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <img src="<?= base_url('assets/img/logo.png') ?>" width="40px" alt="">
    <div class="sidebar-brand-text mx-3">Absensi</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <?php if ( user()['role_id'] == 1) : ?>


    <div class="sidebar-heading">
      Admin
    </div>


    <li class="nav-item active">
      <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('dashboard') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </li>


        <li class="nav-item active">
          <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('admin'); ?>">
              <i class="fas fa-fw fa-user"></i>
              <span>Data User</span></a>
            </li>



            <hr class="sidebar-divider mt-3">

          <?php endif; ?>

          <div class="sidebar-heading">
            User
          </div>

          <li class="nav-item active">
            <li class="nav-item">
              <a class="nav-link pb-0" href="<?= base_url('user'); ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>My Profile</span></a>
              </li>



              <hr class="sidebar-divider mt-3">


              <div class="sidebar-heading">
                Absen
              </div>

              <li class="nav-item active">
                <li class="nav-item">
                  <a class="nav-link pb-0" href="<?= base_url('siswa'); ?>">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Data Siswa</span></a>
                  </li>


                  <li class="nav-item active">
                    <li class="nav-item">
                      <a class="nav-link pb-0" href="<?= base_url('kelas'); ?>">
                        <i class="fas fa-fw fa-home"></i>
                        <span>Data Kelas</span></a>
                      </li>


                      <li class="nav-item active">
                        <li class="nav-item">
                          <a class="nav-link pb-0" href="<?= base_url('rekap'); ?>">
                            <i class="fas fa-fw fa-book-open"></i>
                            <span>Rekap</span></a>
                          </li>


                          <!-- Nav Item - Pages Collapse Menu -->
                          <li class="nav-item">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                              <i class="fas fa-fw fa-book"></i>
                              <span>Absensi</span>
                            </a>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                              <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="<?= base_url('absensi') ?>">Absensi hari ini</a>
                                <a class="collapse-item" href="<?= base_url('absensi/mounth') ?>">Absensi bulan ini</a>
                              </div>
                            </div>
                          </li>

                          <hr class="sidebar-divider mt-3">


                          <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('home/logout'); ?>">
                              <i class="fas fa-fw fa-sign-out-alt"></i>
                              <span>Logout</span></a>
                            </li>

                            <!-- Divider -->
                            <hr class="sidebar-divider d-none d-md-block">


                            <!-- Sidebar Toggler (Sidebar) -->
                            <div class="text-center d-none d-md-inline">
                              <button class="rounded-circle border-0" id="sidebarToggle"></button>
                            </div>

                          </ul>
          <!-- End of Sidebar -->