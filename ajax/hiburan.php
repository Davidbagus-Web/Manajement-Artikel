<?php
sleep(1);
require "../functions.php";

$keyword = $_GET["keyword"];

$query = "SELECT * FROM hiburan
            WHERE 
            judul LIKE '%$keyword%' OR
            slug LIKE '%$keyword%'  OR
            category LIKE '%$keyword%' 
            ";

$hiburan = query($query);
        

?>


<table border="1" cellspacing="0" cellpadding="8">
        <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>Judul</th>
        <th>Category</th>
        <th>Slug</th>
        <th>Deskripsi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach( $hiburan as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"];?>">Edit</a> |
                <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('yakin?')">Hapus</a>
            </td>
            <td><img src="img/<?= $row["gambar"];?>" width="50"></td>
            <td><?= $row["slug"]; ?></td>
            <td><?= $row["category"]; ?></td>
            <td><?= $row["judul"]; ?></td>
            <td><?= $row["deskripsi"]; ?></td>       
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
        
    </table>