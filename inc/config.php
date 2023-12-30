<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "dbcmsku"; // Ganti dengan nama database yang benar

try {
    $conn = new mysqli($host, $user, $pass, $dbname);

    if ($conn->connect_error) {
        throw new Exception("Koneksi ke MySQL gagal: " . $conn->connect_error);
    }

    // Mengecek apakah database 'dbcmsku2' ditemukan
    $result = $conn->query("SHOW DATABASES LIKE '$dbname'");
    if ($result->num_rows == 0) {
        throw new Exception("Database '$dbname' tidak ditemukan.");
    }

    //echo "Koneksi sukses";
} catch (Exception $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>