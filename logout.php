<?php 
session_start();
$_SESSION = [];
session_unset(); // session nya hilang
session_destroy(); //hapus / hancurkan sessionnya

// cara menghapus cookie
setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);

header("Location: login.php");
exit;
 ?>