<?php
include "../../../inc/config.php";

if (isset($_GET['id'])) {
    // Gunakan MySQLi dan prepared statement untuk mencegah SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $query = "DELETE FROM berita WHERE id='$id'";
    
    if (mysqli_query($conn, $query)) {
        header('location:../../dashboard.php?m=berita');
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    header('location:../../dashboard.php?m=berita');
}
?>
