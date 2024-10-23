<?php
session_start();
session_destroy();
header("Location: login.php"); // Mengarahkan kembali ke halaman login
exit;
?>
