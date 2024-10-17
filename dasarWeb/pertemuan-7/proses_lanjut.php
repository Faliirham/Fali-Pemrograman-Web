<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $selectedBuah = $_POST['buah'];

    if (isset($_POST['warna'])) {
        $selectedWarna = $_POST['warna'];
    }else{
        $selectedWarna = [];
    }

    $selectedJenisKelamin = $_POST['jenis_kelamin'];

    echo"Anda memilih Buah: " . $selectedBuah."<br>";

    if(!empty($selectedWarna)){
       echo"Warna favorit Anda: ".implode(", ", $selectedWarna)."<br>";
    }else{
        echo"Anda belum memilih warna favorit.<br>";
    }

    echo"Jenis Kelamin Anda: ". $selectedJenisKelamin."<br>";
}
?>