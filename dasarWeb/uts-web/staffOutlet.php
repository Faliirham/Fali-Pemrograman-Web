<?php
require 'database.php';


$outlets_sql = "SELECT OutletID, OutletName FROM Outlets";
$outlets_result = $conn->query($outlets_sql);

$selected_outlet = isset($_GET['outlet']) ? $_GET['outlet'] : '';
$selected_workday = isset($_GET['workday']) ? $_GET['workday'] : '';


$sql = "SELECT o.OutletName, s.StaffName, s.Shift, s.WorkDay
        FROM Staff s
        JOIN Outlets o ON s.OutletID = o.OutletID
        WHERE 1 = 1";


if ($selected_outlet) {
    $sql .= " AND s.OutletID = :outlet";
}
if ($selected_workday) {
    $sql .= " AND s.WorkDay = :workday";
}

$stmt = $conn->prepare($sql);


if ($selected_outlet) {
    $stmt->bindParam(':outlet', $selected_outlet, PDO::PARAM_INT);
}
if ($selected_workday) {
    $stmt->bindParam(':workday', $selected_workday, PDO::PARAM_STR);
}

$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleStaff.css" type="text/css">
    <title>Staff Shift</title>
</head>
<body>
    <h2>List Staff dan Shift</h2>
    <a href="landing.php" class="back-button">Kembali Ke Dashboard</a>

    <!-- Form Filter -->
    <form method="GET" action="">
        <label for="outlet">Filter by Outlet:</label>
        <select name="outlet" id="outlet">
            <option value="">--Select Outlet--</option>
            <?php while ($outlet = $outlets_result->fetch()) { ?>
                <option value="<?php echo $outlet['OutletID']; ?>" 
                <?php if ($selected_outlet == $outlet['OutletID']) echo 'selected'; ?>>
                    <?php echo $outlet['OutletName']; ?>
                </option>
            <?php } ?>
        </select>

        <label for="workday">Filter by Work Day:</label>
        <select name="workday" id="workday">
            <option value="">--Select Day--</option>
            <option value="Monday" <?php if ($selected_workday == 'Monday') 
            echo 'selected'; ?>>Monday</option>
            <option value="Tuesday" <?php if ($selected_workday == 'Tuesday') 
            echo 'selected'; ?>>Tuesday</option>
            <option value="Wednesday" <?php if ($selected_workday == 'Wednesday') 
            echo 'selected'; ?>>Wednesday</option>
            <option value="Thursday" <?php if ($selected_workday == 'Thursday') 
            echo 'selected'; ?>>Thursday</option>
            <option value="Friday" <?php if ($selected_workday == 'Friday') 
            echo 'selected'; ?>>Friday</option>
            <option value="Saturday" <?php if ($selected_workday == 'Saturday') 
            echo 'selected'; ?>>Saturday</option>
            <option value="Sunday" <?php if ($selected_workday == 'Sunday') 
            echo 'selected'; ?>>Sunday</option>
        </select>

        <button type="submit">Filter</button>
    </form>


    <table border="1">
        <tr>
            <th>Outlet Name</th>
            <th>Staff Name</th>
            <th>Shift</th>
            <th>Work Day</th>
        </tr>
        <?php while ($row = $stmt->fetch()) { ?>
            <tr>
                <td><?php echo $row['OutletName']; ?></td>
                <td><?php echo $row['StaffName']; ?></td>
                <td><?php echo $row['Shift']; ?></td>
                <td><?php echo $row['WorkDay']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>