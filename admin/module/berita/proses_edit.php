<?php
include "../../../inc/config.php";

if (!empty($_POST['judul'])) {
    // proses update
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $isi = mysqli_real_escape_string($conn, $_POST['isi']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $query = "UPDATE berita SET id_kategori='$kategori', judul='$_POST[judul]', isi='$isi' WHERE id='$id'";
    
    if (mysqli_query($conn, $query)) {
        header('location:../../dashboard.php?m=berita');
    } else {
        echo "Gagal melakukan pembaruan data: " . mysqli_error($conn);
    }
} else {
    header('location:../../dashboard.php?m=berita');
}
?>
