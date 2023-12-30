<?php
session_start();
if(!isset($_SESSION['login'])){
	header('location:index.php');
}
include "../inc/config.php";
?>
<!DOCTYPE html>
<html>
<head> 
<title>Halaman Administrator - Content Management System</title>
<link rel="stylesheet" href="style.css"/>
<script src="../tinymce/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script>
	tinymce.init({selector:'textarea'});
</script>
</head>
<body>
<table width="100%">
	<tr>
	<td colspan="2" bgcolor="ebebeb"><h1>Content Management System</h2>
	</tr>
	<tr>
		<td valign="top" width="250px" bgcolor="#ebebeb">
			<div class="menu">
				<ul>
					<li><a href="./dashboard.php">Home</a></li>
					<li><a href="./dashboard.php?m=kategori">Manajemen Kategori</a></li>
					<li><a href="./dashboard.php?m=berita">Manajemen Berita</a></li>
					<li><a href="./dashboard.php?m=komentar">Manajemen Komentar</a></li>
					<li><a href="./dashboard.php?m=halaman">Manajemen Halaman</a></li>
					<li><a href="./dashboard.php?m=pegawai">Data Pegawai</a></li>
					<li><a href="./logout.php">Logout</a></li>
				</ul>
			</div>
		</td>
		<td valign="top">
			<div class="content">
				<?php include "content.php"; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2" bgcolor="ebebeb">Copyright &copy; 2023 CMS KU</h2>
	</tr>
</table>
</body>
</html>