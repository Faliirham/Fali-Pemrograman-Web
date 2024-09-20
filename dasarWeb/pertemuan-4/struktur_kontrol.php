<?php 
//Soal No 4.1 
$nilaiNumerik = 92;

if ($nilaiNumerik >= 90 && $nilaiNumerik <= 100) {
    //echo "Nilai Huruf: A";
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
//echo "Atlet tersebut memerlukan $hari hari untuk mencapai jarak 500 Kilometer";

//Soal No 4.3
$jumlahLahan = 10;
$tanamanPerlahan = 5;
$buahPerTanaman = 10;
$jumlahBuah = 0;

for($i = 1; $i <= $jumlahLahan;$i ++){
    $jumlahBuah += ($tanamanPerlahan + $buahPerTanaman);
}
echo "<h2>Jumlah buah yang akan dipanen adalah : $jumlahBuah </h2>";
?>