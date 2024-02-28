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
                            <h1 class="m-0">Laporan Cuti</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Laporan Cuti</li>
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
                                    <div class="d-flex align-items-center">
                                      <div class="flex-grow-1 ms-2"><h5>Filter</h5></div>
                                      <button type="button" class="btn btn-primary" id="filter-button-plus"><i class="fa fa-plus me-0"></i></button>
                                      <button type="button" class="btn btn-secondary" id="filter-button-minus" hidden><i class="fa fa-minus me-0"></i></button>
                                  </div>
                              </div>

                              <div class="card-body filter-content" hidden>
                                <form action="#" id="form-filter" class="form-horizontal">
                                  <div class="col-md-12">

                                    <div class="row mb-3"> 
                                      <div class="col-md-2"></div>
                                      <div class="col-md-2">
                                        <label>Nama Karyawan</label>                            
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <select class="form-control single-select" id="filter_employee_id">
                                            </select>
                                        </div>
                                    </div>
                                </div> 

                                <div class="row mb-2"> 
                                  <div class="col-md-2"></div>
                                  <div class="col-md-2">
                                    <label>Mulai Dari</label>                            
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <input id="filter_start_date" class="form-control" type="date">
                                  </div>
                              </div>        
                          </div>

                          <div class="row mb-3"> 
                              <div class="col-md-2"></div>
                              <div class="col-md-2">
                                <label>Berakhir Sampai</label>                            
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                  <input id="filter_end_date" class="form-control" type="date">
                              </div>
                          </div>        
                      </div>



                  </div>
              </form>
          </div>

          <!-- start card-footer -->
          <div class="card-footer filter-content" hidden>
            <div class="row"> 
              <div class="col-md-5"></div>
              <div class="col-md-3">
                <button id="btn-reset" type="button" class="btn btn-secondary">Reset</button>
                <button id="btn-filter" type="button" class="btn btn-info">Filter</button>
                <button id="btn-export" type="button" class="btn btn-warning" onclick="printData()">Export</button>
            </div> 
        </div>
    </div>
    <!-- /.card-footer -->
</div>
</div>
</div>
</div>


<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Laporan Cuti Kayawan</h3>
                </div>

                <div class="card-body">
                    <table id="table" class="table table-bordered table-striped" width="100%">
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
                            </tr>
                        </thead>

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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="<?php echo base_url('assets/plugins/select2/js/select2.min.js')?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        callCondition();

        table = $('#table').DataTable({
          "processing": true, 
          "serverSide": true, 
          "scrollX": true,
          "order": [], 

          "ajax": {
            "url": "<?= base_url();?>Laporan/getData",
            "type": "POST",
            "data": function(data) {

              data.employee_filter      = $('#filter_employee_id').val();
              data.start_date_filter    = $('#filter_start_date').val();
              data.end_date_filter      = $('#filter_end_date').val();
          }
      },

      "columnDefs": [{
        "targets": [-1], 
        "orderable": false, 
    }],

  }); 

    });

    $('.single-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });

    $('#filter-button-plus').on('click', function () {
        $('#filter-button-plus').prop('hidden', true);
        $('#filter-button-minus').prop('hidden', false);
        $('.filter-content').prop('hidden', false);

        callCondition();
    });

    $('#filter-button-minus').on('click', function () {
        $('#filter-button-plus').prop('hidden', false);
        $('#filter-button-minus').prop('hidden', true);
        $('.filter-content').prop('hidden', true);

    });

    $('#btn-filter').on('click', function () {
        reload_table();
    });

    $('#btn-reset').click(function() {
        $('#form-filter')[0].reset();

        callCondition();

        reload_table();
    });

    function callCondition(){
        setFilterDataEmployee(0);
    }


    function setFilterDataEmployee(id) {
        $.getJSON("get_data_karyawan",function(data) {
            $('#filter_employee_id').empty();
            if (id == 0) {
                $('#filter_employee_id').append("<option value='0' selected> -- Pilih Karyawan -- </option>");
                $.each(data, function(key, value) {
                    $('#filter_employee_id').append("<option value=" + value.id_user + "> " + value.nama_lengkap + "</option>");
                });
            } else {
                $.each(data, function(key, value) {
                    var selected = false;
                    if (id == value.id_user) {
                        $('#filter_employee_id').append("<option value=" + value.id_user + " selected> " + value.nama_lengkap + "</option>");
                        selected = true;
                    }

                    if(selected == false){
                        $('#filter_employee_id').append("<option value=" + value.id_user + "> " + value.nama_lengkap + "</option>");
                    }
                });

            }

        });
    }

    function reload_table() {
        table.ajax.reload(null, false);
    }

    function printData() {

        var employee_filter      = $('#filter_employee_id').val();
        var start_date_filter    = $('#filter_start_date').val();
        var end_date_filter      = $('#filter_end_date').val();

        if(isEmpty(start_date_filter)) {
            start_date_filter = 0;
        }

        if(isEmpty(end_date_filter)) {
            end_date_filter = 0
        }

        var url = "<?php echo site_url('Laporan/cetak_laporan_cuti/') ?>"+employee_filter+"/"+start_date_filter+"/"+end_date_filter;
        document.location = url;
    }


    function isEmpty(value) {
        if (typeof value === "undefined" || value === null || value === "null" || value === "") {
            return true;
        } else {
            return false;
        }
    }
</script>

<?php $this->load->view("admin/components/js.php") ?>
</body>

</html>