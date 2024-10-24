<?php
require 'database.php';

try {
    
    $sql = "SELECT o.OutletName, r.Rating, r.Date, r.Month, r.Year
            FROM Ratings r
            JOIN Outlets o ON r.OutletID = o.OutletID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();


    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  
    $ratings = [];
    if ($result) {
        foreach ($result as $row) {
            if (!in_array($row['Rating'], $ratings)) {
                $ratings[] = $row['Rating'];
            }
        }
    } else {
        throw new Exception("No ratings found.");
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
    exit;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating Outlet</title>
    <link rel="stylesheet" href="styleRating.css"> 
</head>
<body>
    <h2>Rating Outlet</h2>
    <a href="landing.php" class="back-button">Kembali Ke Dashboard</a>

    <label for="ratingFilter">Filter by Rating:</label>
    <select id="ratingFilter" onchange="filterTable()">
        <option value="">--Select Rating--</option>
        <?php foreach ($ratings as $rating) { ?>
            <option value="<?php echo htmlspecialchars($rating); ?>"><?php echo htmlspecialchars($rating); ?></option>
        <?php } ?>
    </select>

    <table id="ratingsTable" class="styled-table">
        <thead>
            <tr>
                <th>Outlet Name</th>
                <th>Rating</th>
                <th>Date</th>
                <th>Month</th>
                <th>Year</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($result)) { ?>
                <?php foreach ($result as $row) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['OutletName']); ?></td>
                        <td><?php echo htmlspecialchars($row['Rating']); ?></td>
                        <td><?php echo htmlspecialchars($row['Date']); ?></td>
                        <td><?php echo htmlspecialchars($row['Month']); ?></td>
                        <td><?php echo htmlspecialchars($row['Year']); ?></td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="5">No ratings found.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <script>
        function filterTable() {
            var select, filter, table, tr, td, i;
            select = document.getElementById("ratingFilter");
            filter = select.value;
            table = document.getElementById("ratingsTable");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) { 
                tr[i].style.display = "none"; 
                td = tr[i].getElementsByTagName("td")[1]; 
                if (td) {
                    if (filter === "" || td.textContent === filter) {
                        tr[i].style.display = ""; 
                    }
                }
            }
        }
    </script>
</body>
</html>
