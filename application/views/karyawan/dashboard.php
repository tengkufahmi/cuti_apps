<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("karyawan/components/header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php if ($this->session->flashdata('input')) { ?>
        <script>
            swal({
                title: "Success!",
                text: "Data Berhasil Ditambahkan!",
                icon: "success"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror')) { ?>
        <script>
            swal({
                title: "Erorr!",
                text: "Data Gagal Ditambahkan!",
                icon: "error"
            });
        </script>
    <?php } ?>
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url(); ?>assets/admin_lte/dist/img/Loading.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <?php $this->load->view("karyawan/components/navbar.php") ?>
        
        <?php $this->load->view("karyawan/components/sidebar.php") ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"> Dashboard | Karyawan </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?= $cuti['total_cuti'] ?></h3>

                                    <p>Data Cuti</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="<?= base_url(); ?>Cuti/view_karyawan/<?= $this->session->userdata('id_user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= $cuti_acc['total_cuti'] ?></h3>

                                    <p>Data Cuti Diterima</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="<?= base_url(); ?>Cuti/view_karyawan/<?= $this->session->userdata('id_user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?= $cuti_reject['total_cuti'] ?></h3>

                                    <p>Data Cuti Ditolak</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="<?= base_url(); ?>Cuti/view_karyawan/<?= $this->session->userdata('id_user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?= $cuti_confirm['total_cuti'] ?></h3>

                                    <p>Data Cuti Menunggu Konfirmasi</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="<?= base_url(); ?>Cuti/view_karyawan/<?= $this->session->userdata('id_user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php

                                    if ($cuti_karyawan == null) {
                                        echo 'Belum Ada';
                                    } else {

                                        $now = time();
                                        $mulai = strtotime($cuti_karyawan[0]['mulai']);
                                        $berakhir = strtotime($cuti_karyawan[0]['berakhir']);

                                        $hari_kerja = 0;

                                        while ($mulai <= $berakhir) {
                                            /* Cek jika hari ini bukan Sabtu (6) atau Minggu (7) */
                                            if (date('N', $mulai) < 6) {
                                                $hari_kerja++;
                                            }

                                            $mulai = strtotime('+1 day', $mulai);
                                        }

                                        if ($hari_kerja > 0) {
                                            echo $hari_kerja . ' Hari Lagi';
                                        } else {
                                            echo "Belum Ada";
                                        }
                                    }

                                ?></h3>

                                <p>Sisa Cuti</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="<?= base_url(); ?>Cuti/view_karyawan/<?= $this->session->userdata('id_user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <h1>Syarat Permohonan Cuti</h1>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text"> Cuti Bepergian : (Maksimal 3 Hari) </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text"> Cuti Hamil : (Maksimal 4 Bulan) </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text"> Cuti Sakit : (Maksimal 7 Hari) </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text"> Cuti Penting : (Maksimal 1 Bulan) </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>

<?php $this->load->view("karyawan/components/js.php") ?>
</body>

</html>