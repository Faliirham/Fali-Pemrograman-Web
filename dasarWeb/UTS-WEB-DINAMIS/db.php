<?php
try {
    // Menggunakan DSN untuk SQL Server dengan format yang benar
    $pdo = new PDO("sqlsrv:server=YERIMI\\SQLEXPRESS;database=cafe_system");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Koneksi ke database berhasil!";
} catch (PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}
?>
