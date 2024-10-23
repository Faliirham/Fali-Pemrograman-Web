<?php
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username== 'admin' && $password == '1234') {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['status'] = 'login';
        echo "Anda Berhasil Login. silakan menuju <a href='homeSession.php'> HalamanHome </a>";
    }else{
        echo "Gagal Login. silakan login lagi <a href='sessionLoginForm.html'> Halaman Login </a>";
    }
?>