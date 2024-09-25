<?php 

// Soal No 5.1
$nilaiSiswa = [85, 92, 78, 64, 90, 55, 88, 79, 70, 96];

$nilaiLulus = [];

foreach ($nilaiSiswa as $nilai) {
    if ($nilai >= 70) {
      $nilaiLulus [] = $nilai;   
    } 
}

//echo "Daftar nilai siswa yang lulus : " . implode (',', $nilaiLulus);

// Soal No 5.2

$daftraKaryawan = [
    ['Alice' , 7],
    ['Bob', 3],
    ['Charlie' , 9],
    ['David', 5],
    ['Eve', 6]
];

$karyawanPengalamanLimaTahun = [];

foreach ($daftraKaryawan as $karyawan) {
    if ($karyawan[1] >= 5) {
      $karyawanPengalamanLimaTahun [] = $karyawan[0];   
    }
}

echo "Daftar karyawan dengan pengalaman kerja lebih dari 5 Tahun: " . implode (', ', 
$karyawanPengalamanLimaTahun);
?>