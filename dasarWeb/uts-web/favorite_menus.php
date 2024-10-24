<?php
require 'database.php';

// Initialize filter variables
$selected_week = $_GET['week'] ?? '';
$selected_month = $_GET['month'] ?? '';
$selected_year = $_GET['year'] ?? '';

// Prepare the SQL query with filtering
$query = "SELECT fm.MenuID, fm.MenuName, fm.Week, fm.Month, fm.Year, o.OutletName 
          FROM dbo.FavoriteMenus fm 
          JOIN dbo.Outlets o ON fm.OutletID = o.OutletID 
          WHERE fm.OrderCount > 100"; 

// Append filters to the query
if ($selected_week) {
    $query .= " AND fm.Week = ?";
}
if ($selected_month) {
    $query .= " AND fm.Month = ?";
}
if ($selected_year) {
    $query .= " AND fm.Year = ?";
}

// Prepare parameters for the query
$params = array_filter([$selected_week, $selected_month, $selected_year]);

// Fetch filtered favorite menus
$favorites = query($query, $params);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Favorite Menus</title>
    <link rel="stylesheet" href="styleFavoriteMenu.css">
</head>
<body>
    <h1>Favorite Menu List</h1>

    <a href="landing.php" class="back-button">Back to Landing</a>
    <div class="filter-form">
        <form method="GET">
            <select name="week">
                <option value="">Select Week</option>
                <?php for ($i = 1; $i <= 52; $i++): ?>
                    <option value="<?php echo $i; ?>" <?php echo ($selected_week == $i) ? 'selected' : ''; ?>>Week <?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            <select name="month">
                <option value="">Select Month</option>
                <?php for ($i = 1; $i <= 12; $i++): ?>
                    <option value="<?php echo $i; ?>" <?php echo ($selected_month == $i) ? 'selected' : ''; ?>>Month <?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            <select name="year">
                <option value="">Select Year</option>
                <?php 
                $current_year = date("Y");
                for ($i = $current_year - 5; $i <= $current_year + 5; $i++): ?>
                    <option value="<?php echo $i; ?>" <?php echo ($selected_year == $i) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            <button type="submit">Filter</button>
        </form>
    </div>

    <ul>
        <?php if (count($favorites) > 0): ?>
            <?php foreach ($favorites as $favorite): ?>
                <li>
                    <span class="menu-name"><?php echo htmlspecialchars($favorite['MenuName']); ?></span> 
                    <span class="outlet-name">(<?php echo htmlspecialchars($favorite['OutletName']); ?>)</span>
                    <div class="info">Week: <?php echo htmlspecialchars($favorite['Week']); ?></div>
                    <div class="info">Month: <?php echo htmlspecialchars($favorite['Month']); ?></div>
                    <div class="info">Year: <?php echo htmlspecialchars($favorite['Year']); ?></div>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No favorite menus found for the selected filters.</li>
        <?php endif; ?>
    </ul>
</body>
</html>