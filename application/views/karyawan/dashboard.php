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
                                            $your_date = strtotime($cuti_karyawan[0]['berakhir']);
                                            $datediff = $your_date - $now;

                                            $date_akhir = round($datediff / (60 * 60 * 24));

                                            $now = time();
                                            $your_date = strtotime($cuti_karyawan[0]['mulai']);
                                            $datediff = $now - $your_date;

                                            $date_mulai = round($datediff / (60 * 60 * 24));

                                            if ($date_mulai >= 0 and $date_akhir >= 0) {
                                                echo $date_akhir . ' Hari Lagi';
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


                </div>
            </section>
        </div>
        
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <?php $this->load->view("karyawan/components/js.php") ?>
</body>

</html>
