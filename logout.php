<?php
session_start();
unset($_SESSION['access_token']);
header('Location: login.php'); // Setelah logout, arahkan kembali ke halaman login
?>
