<?php
include "../../../inc/config.php";

if (!empty($_POST['kategori'])) {
    // proses simpan
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $query = "INSERT INTO kategori (nm_kategori) VALUES ('$kategori')";
    
    if (mysqli_query($conn, $query)) {
        header('location:../../dashboard.php?m=kategori');
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
} else {
    header('location:../../dashboard.php?m=kategori');
}
?>
