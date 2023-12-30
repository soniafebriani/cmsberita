<?php
include "../../../inc/config.php";

if (!empty($_POST['kategori'])) {
    // proses update
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $query = "UPDATE kategori SET nm_kategori='$kategori' WHERE id='$id'";
    
    if (mysqli_query($conn, $query)) {
        header('location:../../dashboard.php?m=kategori');
    } else {
        echo "Gagal melakukan pembaruan data: " . mysqli_error($conn);
    }
} else {
    header('location:../../dashboard.php?m=kategori');
}
?>
