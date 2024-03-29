<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/components/header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php if ($this->session->flashdata('input')){ ?>
        <script>
            swal({
                title: "Success!",
                text: "Status Cuti Berhasil Diubah!",
                icon: "success"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_input')){ ?>
        <script>
            swal({
                title: "Erorr!",
                text: "Status Cuti Gagal Diubah!",
                icon: "error"
            });
        </script>
    <?php } ?>
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url();?>assets/admin_lte/dist/img/Loading.png"
            alt="AdminLTELogo" height="60" width="60">
        </div>

        <?php $this->load->view("admin/components/navbar.php") ?>

        <?php $this->load->view("admin/components/sidebar.php") ?>

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
                                    <h3 class="card-title">Data Cuti Kayawan</h3>
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
                                                            data-target="#edit_data_pegawai">
                                                            Menunggu Konfirmasi
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php }else if($id_status_cuti == 2) {?>
                                                <div class="table-responsive">
                                                    <div class="table table-striped table-hover ">
                                                        <a href="" class="btn btn-info" data-toggle="modal"
                                                        data-target="#edit_data_pegawai">
                                                        Izin Cuti Diterima
                                                    </a>
                                                </div>
                                            </div>
                                        <?php } else if($id_status_cuti == 3) {?>
                                            <div class="table-responsive">
                                                <div class="table table-striped table-hover ">
                                                    <a href="" class="btn btn-info" data-toggle="modal"
                                                    data-target="#edit_data_pegawai">
                                                    Izin Cuti Ditolak
                                                </a>
                                            </div>
                                        </div>
                                    <?php }?>
                                </td>
                                <td>

                                    <?php if($id_status_cuti == 1){ ?>
                                        <div class="table-responsive">
                                            <div class="table table-striped table-hover ">
                                                <a href="#" class="btn btn-primary" onclick="approveDataCuti('<?php echo $id_cuti ?>')">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                            </div>
                                        </div>

                                    <?php }?>


                                </td>
                            </tr>

                            <div class="modal fade" id="setuju<?= $id_cuti ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Setujui Data
                                                Cuti
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form
                                        action="<?php echo base_url()?>Cuti/acc_cuti_admin/2"
                                        method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="hidden" name="id_cuti"
                                                value="<?php echo $id_cuti?>">
                                                <input type="hidden" name="id_user"
                                                value="<?php echo $id_user?>">
                                                <p>Apakah kamu yakin ingin Menyetujui Izin Cuti ini?</p>
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

                    <div class="modal fade" id="tidak_setuju<?= $id_cuti ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tolak Data
                                        Cuti
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form
                                action="<?php echo base_url()?>Cuti/acc_cuti_admin/3"
                                method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="id_cuti"
                                        value="<?php echo $id_cuti?>" />
                                        <input type="hidden" name="id_user"
                                        value="<?php echo $id_user?>" />

                                        <p>Apakah kamu yakin ingin Menolak Izin Cuti ini?</p>
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

    function approveDataCuti(idCuti) {

        var url = "<?php echo base_url()?>Cuti/acc_cuti_admin_v2";

        var jsonData = {
            id_cuti: idCuti
        };



        $.ajax({
            type: 'POST',
            url: url,
            contentType: 'application/json; charset=utf-8',
            data: JSON.stringify(jsonData),
            success: function(response) {

                response = JSON.parse(response);

                if(response.status === 'success') {
                    swal({
                        title: "Success!",
                        text: response.message,
                        icon: "success"
                    }).then(function() {
                        location.reload();
                    });
                    
                } else {
                    swal({
                        title: "Error!",
                        text: response.message,
                        icon: "error"
                    });
                }

            },  
            error: function(error) {
                // console.error('Error:', error);
                error = JSON.parse(error.responseText);

                swal({
                    title: "Error!",
                    text: error.message,
                    icon: "error"
                });
            }
        });

    }

</script>

<?php $this->load->view("admin/components/js.php") ?>
</body>

</html>