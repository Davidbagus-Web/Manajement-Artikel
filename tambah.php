<?php 
session_start(); 

if( !isset($_SESSION["login"]) ) { 
	header("Location: login.php");
	exit;
} 

require 'functions.php';
if( isset($_POST["submit"]) ) {

	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
		<script>
		alert('data berhasil ditambahkan!');
		document.location.href = 'index.php';
		</script>
		";
	} else {
		echo "
		<script>
		alert('data gagal ditambahkan!');
		document.location.href = 'index.php';
		</script>
		";
	}
 }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah data Hiburan</title>
</head>
<body>
	<h1>Tambah data Hiburan</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="judul">judul : </label>
				<input type="text" name="judul" id="judul" required>
			</li>
			<li>
				<label for="slug">slug : </label>
				<input type="text" name="slug" id="slug" required>
			</li>
			<li>
				<label for="kategori">kategori : </label>
				<input type="text" name="kategori" id="kategori">
			</li>
			<li>
				<label for="deskripsi">deskripsi : </label>
				<input type="text" name="deskripsi" id="deskripsi">
			</li>
			<li>
				<label for="gambar">Gambar : </label>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data</button>
			</li>
		</ul>
	</form>

</body>
</html>