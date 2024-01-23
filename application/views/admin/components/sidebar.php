<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url();?>assets/login/images/jatibanteng.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"> Desa Jatibanteng </span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url();?>assets/admin_lte/dist/img/account.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?=$this->session->userdata('username');?></a>
            </div>
        </div>

        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url();?>Dashboard/dashboard_admin" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url();?>Karyawan/view_admin" class="nav-link">
                        <i class="nav-icon fas fa-users "></i>
                        <p>Karyawan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url();?>Cuti/view_admin" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>Cuti</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url();?>Settings/view_admin" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Settings</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>