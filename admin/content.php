<?php
if(isset($_GET['m'])){
	if($_GET['m']=='kategori'){
		include "module/kategori/kategori.php";
	}elseif($_GET['m']=='berita'){
		include "module/berita/berita.php";
	}else {
		echo "Module tidak ditemukan...";
	}
}else{
	?>
	<h3>Selamat Datang Administrator</h3>
	<p>Anda Login dengan nama : <b><?php echo $_SESSION['nama']; ?></b></p>
	<?php
}
?>