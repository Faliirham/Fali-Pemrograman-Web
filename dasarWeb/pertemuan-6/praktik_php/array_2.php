<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profil Dosen</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #e9ecef;
                margin: 0;
                padding: 20px;
            }
            p {
                font-size: 16px;
                margin: 10px 0;
                color: #333;
            }
            strong {
                color: grey; 
            }
        </style>
    </head>
    <body>
        <?php
        $Dosen = [
            'nama' => 'Elok Nur Hamdana',
            'domisili' => 'Malang',
            'jenis_kelamin' => 'Perempuan'
        ];
        echo "<p>Nama: <strong>{$Dosen['nama']}</strong></p>";
        echo "<p>Domisili: <strong>{$Dosen['domisili']}</strong></p>";
        echo "<p>Jenis Kelamin: <strong>{$Dosen['jenis_kelamin']}</strong></p>";
        ?>
    </body>
</html>