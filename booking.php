<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'header.php';
    ?>
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php
        include 'navbar.php';
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        include 'sidebar.php';
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Booking</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Booking</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Booking</h3>
                                    <div class="text-right">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahbooking">Tambah Booking</button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Mobil</th>
                                                <th>Jenis Perawatan</th>
                                                <th>Nama Pemilik</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include 'connect.php';
                                            $no = 1;


                                            $query = mysqli_query($conn, "SELECT * FROM booking JOIN users ON booking.user_id = users.id");
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $data['nama_mobil']; ?></td>
                                                    <td><?php echo $data['jenis_perawatan']; ?></td>
                                                    <td><?php echo $data['name']; ?></td>
                                                    <td>
                                                        <a href="viewbooking.php?id_booking=<?php echo $data['id_booking']; ?>" class="btn btn-primary">View</a>
                                                        <a href="editbooking.php?id_booking=<?php echo $data['id_booking']; ?>" class="btn btn-warning">Edit</a>
                                                        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deletebooking<?php echo $data['id_booking']; ?>">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Modal Untuk Delete Booking -->
        <?php
        $query = mysqli_query($conn, "SELECT * FROM booking JOIN users ON booking.user_id = users.id");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <div class="modal fade" id="deletebooking<?php echo $data['id_booking']; ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="deletebooking.php" method="POST">
                            <div class="modal-header">
                                <h4 class="modal-title">Apakah anda yakin untuk menghapus data ini?</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Data ini akan terhapus dari database&hellip;</p>
                                <input type="hidden" value="<?php echo $data['id_booking']; ?>" name="id_booking">
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        <?php
        }
        ?>
        <!-- End Modal Untuk Delete Booking -->

        <!-- Modal Untuk Tambah Data -->
        <div class="modal fade" id="tambahbooking">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="tambahbooking.php" method="POST">
                        <div class="modal-header">
                            <h4 class="modal-title">Form Tambah Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Mobil</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama Mobil" name="nama_mobil">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Jenis Perawatan</label>
                                <input type="text" class="form-control" placeholder="Masukkan Jenis Perawatan" name="jenis_perawatan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Pemilik</label>
                                <select class="custom-select rounded-0" id="exampleSelectRounded0" name="user_id">
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM users WHERE role_id = 2");
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <!-- ENd MOdal Untuk Tambah Data -->

        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php
    include 'footer.php';
    ?>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $("#example1").DataTable();
    </script>
</body>

</html>