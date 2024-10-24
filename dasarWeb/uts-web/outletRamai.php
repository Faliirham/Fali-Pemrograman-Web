<?php
require 'database.php';

$outlet_id_filter = $_GET['outlet_id'] ?? '';
$date_filter = $_GET['date'] ?? '';
$hour_filter = $_GET['hour'] ?? '';
$month_filter = $_GET['month'] ?? '';
$year_filter = $_GET['year'] ?? ''; 


$sql = "SELECT * FROM CrowdData WHERE 1=1";
$params = [];


if ($outlet_id_filter) {
    $sql .= " AND OutletID = ?";
    $params[] = $outlet_id_filter;
}
if ($date_filter) {
    $sql .= " AND Date = ?";
    $params[] = $date_filter;
}
if ($hour_filter) {
    $sql .= " AND Hour = ?";
    $params[] = $hour_filter;
}
if ($month_filter) {
    $sql .= " AND Month = ?";
    $params[] = $month_filter;
}
if ($year_filter) { 
    $sql .= " AND Year = ?";
    $params[] = $year_filter;
}

$crowdData = query($sql, $params); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Popularities</title>
    <link rel="stylesheet" href="styleRamai.css"> 
</head>
<body>
    <h1>View Popularities</h1>
    <a href="landing.php" class="back-button">Kembali Ke Dashboard</a>
    <form method="GET">
        <select name="outlet_id">
            <option value="">Select Outlet</option>
            <?php
            $outlets = query("SELECT DISTINCT OutletID FROM CrowdData");
            foreach ($outlets as $outlet) {
                echo '<option value="' . htmlspecialchars($outlet['OutletID']) . '"' 
                . ($outlet['OutletID'] == $outlet_id_filter ? ' selected' : '') . '>' 
                . htmlspecialchars($outlet['OutletID']) . '</option>';
            }
            ?>
        </select>
        
        <input type="date" name="date" value="<?php echo htmlspecialchars($date_filter); 
        ?>" placeholder="Select Date">
        
        <input type="number" name="hour" value="<?php echo htmlspecialchars($hour_filter); 
        ?>" placeholder="Visit Hour">
        
   
        <select name="month">
            <option value="">Select Month</option>
            <?php
            for ($m = 1; $m <= 12; $m++) {
                echo '<option value="' . $m . '"' . ($m == $month_filter ? ' selected' : '') 
                . '>' . date('F', mktime(0, 0, 0, $m, 1)) . '</option>';
            }
            ?>
        </select>

        
        <select name="year">
            <option value="">Select Year</option>
            <?php
            $currentYear = date("Y");
            for ($y = $currentYear; $y >= $currentYear - 10; $y--) { 
                echo '<option value="' . $y . '"' . ($y == $year_filter ? ' selected' : '') . '>' 
                . $y . '</option>';
            }
            ?>
        </select>
        
        <button type="submit">Filter</button>
    </form>

    <h2>Filtered Popularity List</h2>
    <table>
    <thead>
        <tr>
            <th>Outlet ID</th>
            <th>Date</th>
            <th>Hour</th>
            <th>Month</th>
            <th>Year</th>
            <th>Visitors Count</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($crowdData)): ?>
            <tr>
                <td colspan="6" style="text-align: center;">No records found.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($crowdData as $crowd): ?>
                <tr>
                    <td><?php echo htmlspecialchars($crowd['OutletID']); ?></td>
                    <td><?php echo htmlspecialchars($crowd['Date']); ?></td>
                    <td><?php echo htmlspecialchars($crowd['Hour']); ?></td>
                    <td><?php echo htmlspecialchars($crowd['Month']); ?></td>
                    <td><?php echo htmlspecialchars($crowd['Year']); ?></td>
                    <td><?php echo htmlspecialchars($crowd['VisitorsCount']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
</body>
</html>
