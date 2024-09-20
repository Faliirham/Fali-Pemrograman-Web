<?php 
//Soal No 4.1 
$nilaiNumerik = 92;

if ($nilaiNumerik >= 90 && $nilaiNumerik <= 100) {
    echo "Nilai Huruf: A";
}elseif($nilaiNumerik >= 80 && $nilaiNumerik < 90){
    echo "Nilai Huruf: B";
}elseif($nilaiNumerik >= 70 && $nilaiNumerik < 80){
    echo "Nilai Huruf: C";
}elseif($nilaiNumerik < 70){
    echo "Nilai Huruf: D";
}
//Soal No 4.2 
$jarakSaatIni = 0;
$jarakTarget = 500;
$peningkatanHarian = 30;
$hari = 0;

while ($jarakSaatIni < $jarakTarget) {
    $jarakSaatIni += $peningkatanHarian;
    $hari++;
}
echo "Atlet tersebut memerlukan $hari hari untuk mencapai jarak 500 Kilometer";

//Soal No 4.3
$jumlahLahan = 10;
$tanamanPerlahan = 5;
$buahPerTanaman = 10;
$jumlahBuah = 0;

for($i = 1; $i <= $jumlahLahan;$i ++){
    $jumlahBuah += ($tanamanPerlahan + $buahPerTanaman);
}
echo "<h2>Jumlah buah yang akan dipanen adalah : $jumlahBuah </h2>";

//Soal No 4.4
$skorUjian = [85, 92, 78, 96, 88];
$totalSkor = 0;

foreach ($skorUjian as $skor) {
    $totalSkor += $skor;
}
echo "<h2> Total Skor ujian adalah : $totalSkor </h2>";

//Soal No 4.5

$nilaiMahasiswa = [85, 92, 58, 64, 90, 55, 88, 79, 70, 96];

foreach ($nilaiMahasiswa as $nilai){
    if ($nilai < 60) {
        echo "Nilai: $nilai (Tidak Lulus) <br>";
        continue;
    }
    echo "Nilai: $nilai (Lulus) <br>";
}

//Soal No 4.6
$nilaiSiswa = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];

// Mengurutkan Nilai 
for ($i = 0; $i < count($nilaiSiswa); $i++) {
    for ($j = 0; $j < count($nilaiSiswa) - 1; $j++) {
        if ($nilaiSiswa[$j] > $nilaiSiswa[$j + 1]) {
            $temp = $nilaiSiswa[$j];
            $nilaiSiswa[$j] = $nilaiSiswa[$j + 1];
            $nilaiSiswa[$j + 1] = $temp;
        }
    }
}
//Mentotal Nilai 
$totalNilai = 0;
$jumlahNilai = 0;

for ($i = 2; $i < 8; $i++) { 
    $totalNilai += $nilaiSiswa[$i];
    $jumlahNilai++;
}
//Mencari rata rata
$rataRata = $totalNilai / $jumlahNilai;

echo "Total nilai setelah mengabaikan dua nilai tertinggi dan terendah adalah: $totalNilai <br>";
echo "Rata-rata nilai adalah: $rataRata";


// Soal No 4.7
$pembelian = 120000;
$hargaBayar = $pembelian;

if ($pembelian >= 100000) {
    $hargaBayar = $pembelian - ($pembelian * (20 / 100)); 
}

echo "Harga yang harus dibayar pembeli sebesar Rp. $hargaBayar";
?>

?>