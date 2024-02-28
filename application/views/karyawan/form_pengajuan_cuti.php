<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("karyawan/components/header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <?php if ($this->session->flashdata('input')){ ?>
        <script>
            swal({
                title: "Success!",
                text: "Data Berhasil Ditambahkan!",
                icon: "success"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_input')){ ?>
        <script>
            swal({
                title: "Error!",
                text: "Data Gagal Ditambahkan!",
                icon: "error"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('invalid_leave')){ ?>
        <script>
            swal({
                title: "Error!",
                text: "Mohon maaf cuti Anda tidak bisa dikirim karena melebihi batas!",
                icon: "error"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('null_data')){ ?>
        <script>
            swal({
                title: "Error!",
                text: "Silahkan pilih Jenis Cuti!",
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
                            <h1 class="m-0">Form Permohonan Cuti</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Setting</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            
            <section class="content">
                <div class="container-fluid">
                    <form action="<?= base_url();?>Form_Cuti/proses_cuti" method="POST" enctype="multipart/form-data">
                        <input type="text" value="<?=$this->session->userdata('id_user') ?>" name="id_user" hidden>
                        <div class="form-group">
                            <label for="jenis_cuti">Jenis Cuti</label>
                            <select class="form-control single-select" id="jenis_cuti" name="jenis_cuti" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="perihal_cuti">Perihal Cuti</label>
                            <input type="text" class="form-control" id="perihal_cuti" aria-describedby="perihal_cuti"
                            name="perihal_cuti" required>
                        </div>
                        <div class="form-group">
                            <label for="mulai">Mulai Cuti</label>
                            <input type="date" class="form-control" id="mulai" aria-describedby="mulai" name="mulai"
                            required>
                        </div>
                        <div class="form-group">
                            <label for="berakhir">Berakhir Cuti</label>
                            <input type="date" class="form-control" id="berakhir" aria-describedby="berakhir"
                            name="berakhir" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </section>
        </div>
        <aside class="control-sidebar control-sidebar-dark"> </aside>
    </div>

    <?php $this->load->view("karyawan/components/js.php") ?>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="<?php echo base_url('assets/plugins/select2/js/select2.min.js')?>"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            callCondition();
        });

        function callCondition(){
            setDataJenisCuti(0);
        }

        function setDataJenisCuti(id) {
            $('.single-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });


            $.getJSON("get_data_jenis_cuti",function(data) {
                $('#jenis_cuti').empty();
                if (id == 0) {
                    $('#jenis_cuti').append("<option value='0' selected> -- Pilih Jenis Cuti -- </option>");
                    $.each(data, function(key, value) {
                        $('#jenis_cuti').append("<option value=" + value.id_jenis_cuti + "> " + value.jenis_cuti + "</option>");
                    });
                } else {
                    $.each(data, function(key, value) {
                        var selected = false;
                        if (id == value.id_jenis_cuti) {
                            $('#jenis_cuti').append("<option value=" + value.id_jenis_cuti + " selected> " + value.jenis_cuti + "</option>");
                            selected = true;
                        }

                        if(selected == false){
                            $('#jenis_cuti').append("<option value=" + value.id_jenis_cuti + "> " + value.jenis_cuti + "</option>");
                        }
                    });

                }

            });
        }
    </script>
</body>

</html>