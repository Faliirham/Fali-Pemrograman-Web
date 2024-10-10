<?php
//Soal No 1.1
$umur;
if(isset($umur)&& $umur >=18){
    echo"Anda Sudah Dewawas";
}else{
    echo "Anda belum dewasa atau variabel 'umur' tidak ditemukan";
}

echo "<br>";
//Soal No 1.2
$data = array("nama" => "Jane", "usia"=> 25);
if (isset($data["nama"])) {
    echo "Nama: ". $data["nama"];
}else{
    echo "Variabel 'nama' tidak ditentukan dakam array.";
}
?>

