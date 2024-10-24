<?php
session_start();
require 'database.php'; 

$registerSuccess = '';
$registerError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
   
        $username = $_POST['username'];
        $password = $_POST['password'];


        $sql = "SELECT * FROM dbo.Users WHERE Username = :Username";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':Username' => $username]);
        $existingUser = $stmt->fetch();

        if ($existingUser) {
            $registerError = "Username sudah digunakan. Silakan pilih yang lain.";
        } else {
           
            $sql = "INSERT INTO dbo.Users (Username, Password) VALUES (:Username, :Password)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':Username' => $username, ':Password' => $password]);

       
            $registerSuccess = "Registrasi berhasil. Silakan login.";

            
            echo "<script>alert('Registrasi berhasil. Silakan login.'); window.location.href='login.php';</script>";
            exit();
        }
    } catch (PDOException $e) {
  
        $registerError = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleRegister.css">
    <title>Form Registrasi</title>
</head>
<body>
    <div class="registration-container">
        <h2>Form Registrasi</h2>

        <?php if ($registerSuccess): ?>
            <script>
                alert('<?php echo $registerSuccess; ?>');
            </script>
        <?php endif; ?>
        
        <?php if ($registerError): ?>
            <script>
                alert('<?php echo $registerError; ?>');
            </script>
        <?php endif; ?>

        <form action="register.php" method="POST">
            <label>Username:</label><br>
            <input type="text" name="username" required><br><br>

            <label>Password:</label><br>
            <input type="password" name="password" required><br><br>

            <input type="submit" value="Daftar"><br><br>
        </form>
    </div>
</body>
</html>
