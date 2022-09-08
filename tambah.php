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
			<li class="form-group">
            <label for="judul">Judul :</label>
            <input type="text" name="judul" id="judul">
          </li>
          <li class="form-group">
            <label for="slug">Slug url </label>
            <li class="input-group">
                <span class="input-group-text input-lg bg-primary text-white">http://hiburan.com/  </span>
                <input type="text" name="slug" id="slug">
           </li>
           </li>
           </li>
           </li>
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

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script>
    $('#judul').keyup(function(){
      var str = $(this).val();
      var trims = $.trim(str)
      var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '')
                 $("#slug").val(slug.toLowerCase()+"")
    })
  </script>

</body>
</html>