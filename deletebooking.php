<?php
include 'connect.php';

$id_booking = $_POST['id_booking'];
$query = mysqli_query($conn, "DELETE FROM booking WHERE id_booking='$id_booking'");

if ($query) {
    echo "<script>alert('Data Berhasil dihapus...'); window.location = 'booking.php'</script>";
} else {
    echo "<script>alert('Data Gagal dihapus...'); window.location = 'booking.php'</script>";
}
