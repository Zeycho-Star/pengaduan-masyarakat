
<body id="page-top" class="">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Pengaduan Masyarakat</div>
            </a>
              <?php if ($this->session->level == 'masyarakat') {
                echo '  <!-- Nav Item - Pages Collapse Menu -->
                  <li class="nav-item">
                      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo">
                          <i class="fas fa-users"></i>
                          <span>Masyarakat</span>
                      </a>
                      <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
                          <div class="bg-white py-2 collapse-inner rounded">
                              <h6 class="collapse-header">Pengaduan Masyarakat</h6>
                              <a class="collapse-item" href="'.base_url('c_masyarakat').'">Daftar Laporan</a>

                          </div>
                      </div>
                  </li>';

} else {
   echo  '<!-- Divider -->
   <hr class="sidebar-divider my-0">

   <!-- Nav Item - Dashboard -->
   <li class="nav-item active">
       <a class="nav-link" href="'.base_url('c_petugas').'">
           <i class="fas fa-fw fa-tachometer-alt"></i>
           <span>Dashboard</span></a>
   </li>

   <!-- Divider -->
   <hr class="sidebar-divider">

   <!-- Heading -->
   <div class="sidebar-heading">
     menu
   </div>

   <!-- Nav Item - Pages Collapse Menu -->
   <li class="nav-item">
       <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo">
           <i class="fas fa-comments"></i>
           <span>Pengaduan</span>
       </a>
       <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
           <div class="bg-white py-2 collapse-inner rounded">
               <h6 class="collapse-header">Validasi</h6>
               <a class="collapse-item" href="'.base_url('c_petugas/pengaduan').'">Pengaduan Masuk</a>
               <a class="collapse-item" href="'.base_url('c_petugas/lap_terima').'">Pengaduan Selesai</a>
               <a class="collapse-item" href="'.base_url('c_petugas/lap_proses').'">Pengaduan Proses</a>

           </div>
       </div>
   </li>


   <!-- Nav Item - Pages Collapse Menu -->
   <li class="nav-item">
       <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo3" aria-expanded="false" aria-controls="collapseTwo">
           <i class="fas fa-user-plus"></i>
           <span>Petugas</span>
       </a>
       <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
           <div class="bg-white py-2 collapse-inner rounded">
               <h6 class="collapse-header">Kelola Petugas</h6>
               <a class="collapse-item" href="'.base_url('c_petugas/daftarpetugas').'">Daftar Petugas</a>

           </div>
       </div>
   </li>
';
}?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->
