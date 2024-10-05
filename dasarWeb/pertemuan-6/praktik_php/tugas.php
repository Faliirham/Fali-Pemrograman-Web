<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Database Siswa</title>
    <script src="jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function() {
            $("#toggleButton").click(function() {
                $("#studentData").slideToggle("slow");
            });
        });
    </script>
    <style>
        body {
            background-color: #ffebcd; 
            font-family: 'Arial', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #ff69b4; 
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        #toggleButton {
            padding: 15px;
            border: 2px solid #ff69b4; 
            border-radius: 8px;
            background-color: #ff1493; 
            color: #fff;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
            font-size: 22px;
            transition: background-color 0.3s ease;
            margin: 20px;
        }
        #toggleButton:hover {
            background-color: #db7093; 
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        th {
            padding: 12px;
            border: 2px solid #ff69b4; 
            text-align: left;
            background-color: #ffb6c1; 
            color: #fff;
            font-size: 20px;
        }
        td {
            padding: 12px;
            border: 2px solid #ff69b4; 
            background-color: #fff; 
        }
        #studentData {
            text-align: left;
            background-color: #ffe4e1;
            display: none;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        h2 {
            text-align: center;
            font-style: italic;
            color: #ff1493; 
        }
    </style>
</head>
<body>
    <div id="toggleButton">Klik untuk menampilkan data siswa</div>
    <div id="studentData">
        <h1>Data Siswa</h1>
        <table>
            <tr>
                <th>Nama Lengkap</th>
                <th>Usia</th>
                <th>Kelas</th>
                <th>Alamat Tempat Tinggal</th>
            </tr>
            <?php
            $students = [
                ["Andi", 15, "10A", "Malang"],
                ["Siti", 16, "10B", "Batu"],
                ["Budi", 15, "10A", "Dinoyo"],
                ["Anton", 25, "15A", "Dinoyo"]
            ];

            $totalAge = 0;
            foreach ($students as $info) {
                echo "<tr>";
                echo "<td>{$info[0]}</td>"; // Nama
                echo "<td>{$info[1]}</td>"; // Usia
                echo "<td>{$info[2]}</td>"; // Kelas
                echo "<td>{$info[3]}</td>"; // Alamat
                echo "</tr>";

                $totalAge += $info[1];
            }
            $totalStudents = count($students);
            $averageAge = $totalAge / $totalStudents;
            ?>
        </table>
        <h2>Rata-rata Usia Siswa: <?php echo round($averageAge, 2); ?> tahun</h2>
    </div>
</body>
</html>
