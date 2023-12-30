<?php
session_start();
include "../../../inc/config.php";

if (!empty($_POST['judul'])) {
    $tgl = date("Y-m-d");
    $iduser = $_SESSION['id'];

    // Gunakan MySQLi dan prepared statement untuk mencegah SQL injection
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $query = "INSERT INTO berita (id_kategori,judul,isi,tgl,id_user)
	VALUES ('$kategori','$_POST[judul]','$_POST[isi]','$tgl','$iduser')";

    if (mysqli_query($conn, $query)) {
        header('location:../../dashboard.php?m=berita');
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
} else {
    header('location:../../dashboard.php?m=berita');
}
?>
