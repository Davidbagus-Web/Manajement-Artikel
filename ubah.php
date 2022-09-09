<?php
session_start();
if( !isset($_SESSION["login"]) ) {
	header ("Location: login.php");
	exit;
}

require 'functions.php';

// ambil data diURL
$id = $_GET["id"];

// query data hiburan berdasarkan id
$hiburan = query("SELECT * FROM hiburan WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan apa belum
if( isset($_POST["submit"]) ) {
	

	// cek apakah data berhasil diubah
	if( ubah($_POST) > 0 ) {
		echo "
              <script>
              alert('data berhasil diubah!');
              document.location.href = 'index.php'
              </script>  
            ";
	} else {
		echo "
              <script>
              alert('data gagal diubah!');
              document.location.href = 'index.php'
              </script>  
		";
	}

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah data buku</title>
</head>
<body>

<h1>Ubah data buku</h1>

<form action="" method="post" enctype="multipart/form-data">
	
	<input type="hidden" name="id" value="<?= $hiburan["id"]; ?>">
	<input type="hidden" name="gambarLama" value="<?= $hiburan["gambar"]; ?>">
	<ul>
		<li class="form-group">
				    <label for="judul" class="font-weight-bold">Judul :</label>
				    <input type="text" name="judul" id="judul" required value="<?= $hiburan["judul"]; ?>">
			    </li>
			    <li class="form-group">
			    	<label for="slug" class="font-weight-bold">Slug url :</label>
			    	<li class="input-group">
				        <span class="input-group-text input-lg bg-primary text-white">http://hiburan.com/  </span>
				        <input type="text" name="slug" id="slug" required value="<?= $hiburan["slug"]; ?>" >
				    </li>
			    </li>
		    </li>
		</li>
	    </li>
		<li>
			<label for="category">Category : </label>
			<input type="text" name="category" id="category" required value="<?= $hiburan["category"]; ?>">
		</li>
		<li>
			<label for="deskripsi">Deskripsi : </label>
			<input type="text" name="deskripsi" id="deskripsi" value="<?= $hiburan["deskripsi"]; ?>">
		</li>
		<li>
			<label for="gambar">Gambar : </label>
			<img src="img/<?= $hiburan['gambar']; ?>" width="40"> <br>
			<input type="file" name="gambar" id="gambar" value="<?= $hiburan["gambar"]; ?>">
		</li>
		<li>
			<button type="submit" name="submit">Ubah Data!</button>
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