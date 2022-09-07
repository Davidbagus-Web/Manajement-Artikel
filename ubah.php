<?php 
session_start(); 

if( !isset($_SESSION["login"]) ) { 
  header("Location: login.php");
  exit;
} 

require 'functions.php';
// ambil data di url
$id = $_GET["id"];

// query data hiburan berdasarkan id
$sw = query("SELECT * FROM hiburan WHERE id = $id")[0];

// cek apakah data berhasil di tambahkan atau tidak
if( isset($_POST["submit"]) ) {

// cek apakah data berhasil diubah atau tidak
  if( ubah($_POST) > 0 ) {
    echo "
    <script>
    alert('data berhasil diubah!');
    document.location.href = 'index.php';
    </script>
    ";
  } else {
    echo "
    <script>
    alert('data gagal diubah!');
    document.location.href = 'index.php';
    </script>
    ";
  }
 }
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Update data hiburan</title>
</head>
<body>
  <h1>Update data hiburan</h1>

  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $sw["id"]; ?>">
    <input type="hidden" name="gambarLama" value="<?= $sw["gambar"]; ?>">
    <ul>
      <li>
        <label for="judul">judul : </label>
        <input type="text" name="judul" id="judul" required value="<?= $sw["judul"]; ?>">
      </li>
      <li>
        <label for="slug">slug : </label>
        <input type="text" name="slug" id="slug" value="<?= $sw["slug"]; ?>">
      </li>
      <li>
        <label for="kategori">kategori : </label>
        <input type="text" name="kategori" id="kategori" value="<?= $sw["kategori"]; ?>">
      </li>
      <li>
        <label for="deskripsi">deskripsi : </label>
        <input type="text" name="deskripsi" id="deskripsi" value="<?= $sw["deskripsi"]; ?>">
      </li>
      <li>
        <label for="gambar">Gambar : </label> <br>
        <img src="img/<?= $sw['gambar']; ?>" width="70"> <br>
        <input type="file" name="gambar" id="gambar">
      </li>
      <li>
        <button type="submit" name="submit">Ubah Data</button>
      </li>
    </ul>
  </form>

</body>
</html>