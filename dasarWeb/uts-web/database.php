<?php

// Koneksi ke Database dengan PDO (PHP Data Objects)
try {
    $conn = new PDO("sqlsrv:server=YERIMI\SQLEXPRESS;database=cafe_management_system");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    echo "Connection failed: " . $error->getMessage();
}

//Fungsi query untuk Menjalankan Query SELECT
function query($query, $params = []) {
    global $conn;
    $stmt = $conn->prepare($query);
    $stmt->execute($params);  
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// Fungsi execute untuk Menjalankan Query INSERT, UPDATE, DELETE
function execute($query, $params = []) {
    global $conn;
    $stmt = $conn->prepare($query);
    return $stmt->execute($params);
}
?>
