<?php

try {
    $conn = new PDO("sqlsrv:server=YERIMI\SQLEXPRESS;database=cafe_management_system");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    echo "Connection failed: " . $error->getMessage();
}

function query($query, $params = []) {
    global $conn;
    $stmt = $conn->prepare($query);
    $stmt->execute($params);  
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function execute($query, $params = []) {
    global $conn;
    $stmt = $conn->prepare($query);
    return $stmt->execute($params);
}
?>