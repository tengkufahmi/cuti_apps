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
        text: "Data Berhasil Ditambahkan!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror')){ ?>
    <script>
    swal({
        title: "Erorr!",
        text: "Data Gagal Ditambahkan!",
        icon: "error"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('edit')){ ?>
    <script>
    swal({
        title: "Success!",
        text: "Data Berhasil Diedit!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_edit')){ ?>
    <script>
    swal({
        title: "Erorr!",
        text: "Data Gagal Diedit!",
        icon: "error"
    });
    </script>
    <?php } ?>

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

        <?php $this->load->view("admin/components/navbar.php") ?>
       
        <?php $this->load->view("admin/components/sidebar.php") ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Karyawan</h1>
                        </div>

                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Karyawan</li>
                            </ol>
                        </div>

                        <button type="button" class="btn btn-primary mt-3" data-toggle="modal"
                            data-target="#exampleModal">
                            Tambah Karyawan
                        </button>
                        <br>
                    </div>
                </div>
            </div>
            
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Karyawan</h3>
                                </div>
                              
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Nama Lengkap</th>
                                                <th>Jenis Kelamin</th>
                                                <th>No Telp</th>
                                                <th>Alamat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            foreach($karyawan as $i)
                                            :
                                            $no++;
                                            $id_user = $i['id_user'];
                                            $username = $i['username'];
                                            $password = $i['password'];
                                            $nama_lengkap = $i['nama_lengkap'];
                                            $jenis_kelamin = $i['jenis_kelamin'];
                                            $id_jenis_kelamin = $i['id_jenis_kelamin'];
                                            $no_telp = $i['no_telp'];
                                            $alamat = $i['alamat'];

                                            ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $username ?></td>
                                                <td><?= $nama_lengkap ?></td>
                                                <td><?= $jenis_kelamin ?></td>
                                                <td><?= $no_telp ?></td>
                                                <td><?= $alamat ?></td>
                                                <td>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="" class="btn btn-primary" data-toggle="modal"
                                                                data-target="#edit_data_karyawan<?=$id_user?>">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="" data-toggle="modal"
                                                                data-target="#hapus<?=$id_user?>"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="hapus<?= $id_user ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data
                                                                Karyawan
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo base_url()?>Karyawan/hapus_karyawan"
                                                                method="post" enctype="multipart/form-data">
                                                                <div class="row">
                                                                    <div class="col-md-12">
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

                                            <div class="modal fade" id="edit_data_karyawan<?=$id_user?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                Karyawan</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?=base_url();?>Karyawan/edit_karyawan"
                                                                method="POST">
                                                                <input type="text" value="<?= $id_user ?>" name="id_user" hidden>
                                                                <div class="form-group">
                                                                    <label for="username">Username</label>
                                                                    <input type="text" class="form-control"
                                                                        id="username" aria-describedby="username"
                                                                        name="username" value="<?= $username ?>" required>
                                                                </div>
                                                                    <div class="form-group">
                                                                    <label for="password">Password</label>
                                                                    <input type="text" class="form-control"
                                                                        id="password" aria-describedby="password"
                                                                        name="password" value="<?= $password ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nama_lengkap">Nama Lengkap</label>
                                                                    <input type="text" class="form-control"
                                                                        id="nama_lengkap"
                                                                        aria-describedby="nama_lengkap"
                                                                        name="nama_lengkap" value="<?= $nama_lengkap ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="id_jenis_kelamin">Jenis Kelamin</label>
                                                                    <select class="form-control" id="id_jenis_kelamin"
                                                                        name="id_jenis_kelamin" required>
                                                                        <?php foreach($jenis_kelamin_p as $u)
                                                                :
                                                                $id = $u["id_jenis_kelamin"];
                                                                $jenis_kelamin = $u["jenis_kelamin"];
                                                                ?>
                                                                        <option value="<?= $id ?>" <?php if($id == $id_jenis_kelamin){
                                                                            echo 'selected';
                                                                        }else{
                                                                            echo '';
                                                                        }?>
                                                                        ><?= $jenis_kelamin ?>
                                                                        </option>

                                                                        <?php endforeach?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="no_telp">No Telp</label>
                                                                    <input type="text" class="form-control" id="no_telp"
                                                                        aria-describedby="no_telp" name="no_telp" value="<?= $no_telp ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="alamat">Alamat</label>
                                                                    <input type="text" class="form-control" id="alamat"
                                                                        aria-describedby="alamat" name="alamat" value="<?= $alamat ?>" required>
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Submit</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Karyawan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?=base_url();?>Karyawan/tambah_karyawan" method="POST">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" aria-describedby="username"
                                        name="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" id="password" aria-describedby="password"
                                        name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap"
                                        aria-describedby="nama_lengkap" name="nama_lengkap" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="id_jenis_kelamin" name="id_jenis_kelamin" required>
                                        <?php foreach($jenis_kelamin_p as $u)
                                                                :
                                                                $id = $u["id_jenis_kelamin"];
                                                                $jenis_kelamin = $u["jenis_kelamin"];
                                                                ?>
                                        <option value="<?= $id ?>"><?= $jenis_kelamin ?></option>

                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">No Telp</label>
                                    <input type="text" class="form-control" id="no_telp" aria-describedby="no_telp"
                                        name="no_telp" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" aria-describedby="alamat"
                                        name="alamat" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <aside class="control-sidebar control-sidebar-dark">
           
        </aside>
      
    </div>
   
    <?php $this->load->view("admin/components/js.php") ?>
</body>

</html>