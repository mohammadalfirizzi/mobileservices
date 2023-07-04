<?php
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id_booking = $_POST['id_booking'];
    $nama_mobil = $_POST['nama_mobil'];
    $jenis_perawatan = $_POST['jenis_perawatan'];
    $query = mysqli_query($conn, "UPDATE booking SET nama_mobil = '$nama_mobil', jenis_perawatan = '$jenis_perawatan' WHERE id_booking = '$id_booking'");
    if ($query) {
        echo "<script>alert('Data Berhasil Diupdate'); window.location.href='booking.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Diupdate'); window.location.href='booking.php';</script>";
    }
}
