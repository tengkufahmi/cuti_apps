<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("karyawan/components/header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <?php if ($this->session->flashdata('hapus')){ ?>
    <script>
    swal({
        title: "Success!",
        text: "Data Berhasil Dihapus!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_hapus')){ ?>
    <script>
    swal({
        title: "Erorr!",
        text: "Data Gagal Dihapus !",
        icon: "error"
    });
    </script>
    <?php } ?>

    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url();?>assets/admin_lte/dist/img/Loading.png"
                alt="AdminLTELogo" height="60" width="60">
        </div>

        <?php $this->load->view("karyawan/components/navbar.php") ?>
      
        <?php $this->load->view("karyawan/components/sidebar.php") ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Cuti</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Cuti</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Cuti</h3>
                                    <span class="btn btn-info btn-sm ml-3" onclick="printData()"><i class="nav-icon fas fa-print"></i> Cetak Data : <?php echo $karyawan['nama_lengkap']?></span>
                                </div>
                               
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Lengkap</th>
                                                <th>Tanggal Diajukan</th>
                                                <th>Mulai</th>
                                                <th>Berakhir</th>
                                                <th>Jenis Cuti</th>
                                                <th>Perihal Cuti</th>
                                                <th>Status Cuti</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                        $no = 0;
                                        foreach($cuti as $i)
                                        :
                                        $no++;
                                        $id_cuti = $i['id_cuti'];
                                        $id_user = $i['id_user'];
                                        $nama_lengkap = $i['nama_lengkap'];
                                        $tgl_diajukan = $i['tgl_diajukan'];
                                        $mulai = $i['mulai'];
                                        $berakhir = $i['berakhir'];
                                        $id_status_cuti = $i['id_status_cuti'];
                                        $perihal_cuti = $i['perihal_cuti'];
                                        $jenis_cuti = $i['jenis_cuti'];

                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $nama_lengkap ?></td>
                                                <td><?= $tgl_diajukan ?></td>
                                                <td><?= $mulai ?></td>
                                                <td><?= $berakhir ?></td>
                                                <td><?= $jenis_cuti?></td>
                                                <td><?= $perihal_cuti?></td>
                                                <td><?php if($id_status_cuti == 1){ ?>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="" class="btn btn-info" data-toggle="modal"
                                                                data-target="#edit_data_karyawan">
                                                                Menunggu Konfirmasi
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <?php }elseif($id_status_cuti == 2) {?>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="" class="btn btn-info" data-toggle="modal"
                                                                data-target="#edit_data_karyawan">
                                                                Izin Cuti Diterima
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <?php }elseif($id_status_cuti == 3) {?>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="" class="btn btn-info" data-toggle="modal"
                                                                data-target="#edit_data_karyawan">
                                                                Izin Cuti Ditolak
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <?php }?>
                                                </td>
                                                
                                                <td>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="" data-toggle="modal"
                                                                data-target="#hapus<?= $id_cuti ?>"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            <div class="modal fade" id="hapus<?= $id_cuti ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data
                                                                Cuti
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form action="<?php echo base_url()?>Cuti/hapus_cuti"
                                                                method="post" enctype="multipart/form-data">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input type="hidden" name="id_cuti"
                                                                            value="<?php echo $id_cuti?>" />
                                                                        <input type="hidden" name="id_user"
                                                                            value="<?php echo $id_user?>" />

                                                                        <p>Apakah kamu yakin ingin menghapus data
                                                                            ini?</i></b></p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger ripple"
                                                                        data-dismiss="modal">Tidak</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success ripple save-category">Ya</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <aside class="control-sidebar control-sidebar-dark"> </aside>

    </div>

<script type="text/javascript">
    function printData() {
        var idUser = "<?php echo $karyawan['id_user']?>";
        var url = "<?php echo site_url('Cuti/cetak_pengajuan_cuti/') ?>"+idUser;
        document.location = url;
        // console.log(idUser);
    }
</script>

<script src="<?= base_url();?>assets/admin_lte/plugins/jquery/jquery.min.js"></script>

<script src="<?= base_url();?>assets/admin_lte/plugins/jquery-ui/jquery-ui.min.js"></script>

<script>
$.widget.bridge('uibutton', $.ui.button)
</script>

<script src="<?= base_url();?>assets/admin_lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url();?>assets/admin_lte/plugins/chart.js/Chart.min.js"></script>

<script src="<?= base_url();?>assets/admin_lte/plugins/sparklines/sparkline.js"></script>

<script src="<?= base_url();?>assets/admin_lte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<script src="<?= base_url();?>assets/admin_lte/plugins/jquery-knob/jquery.knob.min.js"></script>

<script src="<?= base_url();?>assets/admin_lte/plugins/moment/moment.min.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/daterangepicker/daterangepicker.js"></script>

<script src="<?= base_url();?>assets/admin_lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>

<script src="<?= base_url();?>assets/admin_lte/plugins/summernote/summernote-bs4.min.js"></script>

<script src="<?= base_url();?>assets/admin_lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="<?= base_url();?>assets/admin_lte/dist/js/adminlte.js"></script>

<!-- <script src="<?= base_url();?>assets/admin_lte/dist/js/demo.js"></script>

<script src="<?= base_url();?>assets/admin_lte/dist/js/pages/dashboard.js"></script>

<script src="<?= base_url();?>assets/admin_lte/dist/js/pages/dashboard.js"></script> -->
<script src="<?= base_url();?>assets/admin_lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": true,
        "buttons": ["colvis"],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

});
</script>

</body>


</html>