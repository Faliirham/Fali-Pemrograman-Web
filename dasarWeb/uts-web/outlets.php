<?php
require 'database.php';

// Initialize variables
$id = '';
$name = '';
$address = '';

// Handle Create and Update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? null;
    $name = $_POST['name'];
    $address = $_POST['address'];

    if ($id) {
        // Update existing outlet
        execute("UPDATE dbo.Outlets SET OutletName = ?, Address = ? WHERE OutletID = ?", [$name, $address, $id]);
    } else {
        // Create new outlet
        execute("INSERT INTO dbo.Outlets (OutletName, Address) VALUES (?, ?)", [$name, $address]);
    }

    // Redirect to avoid form resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    execute("DELETE FROM dbo.Outlets WHERE OutletID = ?", [$id]);
    
    // Redirect to avoid URL manipulation
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Read all outlets
$outlets = query("SELECT * FROM dbo.Outlets");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Outlets</title>
    <link rel="stylesheet" href="styleOutlets.css"> 
</head>
<body>
    <div class="container"> 
        <h1>Manage Outlets</h1>
        
        <a href="landing.php" class="back-button">Back to Landing</a>

        <form method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <input type="text" name="name" placeholder="Outlet Name" value="<?php echo htmlspecialchars($name); ?>" required>
            <input type="text" name="address" placeholder="Outlet Address" value="<?php echo htmlspecialchars($address); ?>" required>
            <button type="submit">Submit</button>
        </form>

        <h2>Outlet List</h2>
        <ul>
            <?php foreach ($outlets as $outlet): ?>
                <li>
                    <span><?php echo htmlspecialchars($outlet['OutletName']); ?> - <?php echo htmlspecialchars($outlet['Address']); ?></span>
                    <div>
                        <a href="?delete=<?php echo $outlet['OutletID']; ?>">Delete</a>
                        <a href="#" onclick="editOutlet(<?php echo $outlet['OutletID']; ?>, '<?php echo addslashes(htmlspecialchars($outlet['OutletName'])); ?>', '<?php echo addslashes(htmlspecialchars($outlet['Address'])); ?>')">Edit</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <script>
        function editOutlet(id, name, address) {
            document.querySelector('input[name="id"]').value = id;
            document.querySelector('input[name="name"]').value = name;
            document.querySelector('input[name="address"]').value = address;
        }
    </script>
</body>
</html>