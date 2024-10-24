<?php
session_start();
require 'database.php'; // Pastikan file ini terkoneksi dengan database dan menginisialisasi $pdo

$registerSuccess = '';
$registerError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Ambil input dari form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Cek apakah username sudah ada
        $sql = "SELECT * FROM dbo.Users WHERE Username = :Username";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':Username' => $username]);
        $existingUser = $stmt->fetch();

        if ($existingUser) {
            $registerError = "Username sudah digunakan. Silakan pilih yang lain.";
        } else {
            // Simpan user baru ke database (password disimpan langsung)
            $sql = "INSERT INTO dbo.Users (Username, Password) VALUES (:Username, :Password)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':Username' => $username, ':Password' => $password]);

            // Jika berhasil, set pesan sukses
            $registerSuccess = "Registrasi berhasil. Silakan login.";

            // Pindahkan redirect ke sini sebelum output HTML
            echo "<script>alert('Registrasi berhasil. Silakan login.'); window.location.href='login.php';</script>";
            exit();
        }
    } catch (PDOException $e) {
        // Tangani error dan tampilkan pesan kesalahan
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

        <!-- Menampilkan pesan sukses jika ada -->
        <?php if ($registerSuccess): ?>
            <script>
                alert('<?php echo $registerSuccess; ?>');
            </script>
        <?php endif; ?>

        <!-- Menampilkan pesan error jika ada -->
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
