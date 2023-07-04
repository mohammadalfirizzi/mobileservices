<?php
include 'connect.php';

$nama_mobil = $_POST['nama_mobil'];
$jenis_perawatan = $_POST['jenis_perawatan'];
$user_id = $_POST['user_id'];

$query = mysqli_query($conn, "INSERT INTO booking (nama_mobil, jenis_perawatan, user_id) VALUES ('$nama_mobil','$jenis_perawatan','$user_id')");

if ($query) {
    echo "<script>alert('Data Berhasil ditambah...'); window.location = 'booking.php'</script>";
} else {
    echo "<script>alert('Data Gagal ditambah...'); window.location = 'booking.php'</script>";
}
