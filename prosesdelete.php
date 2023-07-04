<?php

include 'connect.php';

$id = $_POST['id'];

$query = mysqli_query($conn, "DELETE FROM booking WHERE id_booking='$id'");
if ($query) {
    echo "<script>alert('Data Berhasil dihapus...'); window.location = 'booking.php'</script>";
} else {
    echo "<script>alert('Data Gagal dihapus...'); window.location = 'booking.php'</script>";
}
