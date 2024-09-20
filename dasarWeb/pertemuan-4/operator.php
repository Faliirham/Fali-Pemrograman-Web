<?php
    $a = 10;
    $b = 5;

    $hasilTambah = $a + $b ;
    $hasilKurang = $a - $b ;
    $hasilKali = $a * $b ;
    $hasilBagi = $a / $b ;
    $sisaBagi = $a % $b ;
    $pangkat = $a ** $b;

    $hasilSama = $a == $b;
    $hasilTidakSama = $a != $b;
    $hasilLebihKecil = $a < $b;
    $hasilLebihBesar = $a > $b;
    $hasilLebihKecilSama = $a <= $b;
    $hasilLebihBesarSama = $a >= $b;

    $hasilAnd = $a == $b;
    $hasilOr = $a || $b;
    $hasilNotA = !$a;

    $a += $b;
    $a -= $b;
    $a *= $b;
    $a /= $b;
    $a %= $b;

    $hasilIdentik = $a === $b;
    $hasilTidakIdentik = $a!== $b;

    //SOAL NO 3.6 
    //Sebuah restoran memiliki 45 kursi di dalamnya. Pada suatu malam,
    // 28 kursi telah ditempati oleh pelanggan. Berapa persen kursi yang masih kosong di restoran tersebut?\
    // Kode Program : 

    $kursiRestoran = 45;
    $kursiTempati = 28;
    $kursiKosong = $kursiRestoran - $kursiTempati;
    $persentaseKosong = $kursiKosong / $kursiRestoran * 100;

    echo "Persentase kursi kosong: " . $persentaseKosong .  "%";
?>