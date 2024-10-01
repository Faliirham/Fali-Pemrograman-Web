<?php 
function perkenalan($nama, $salam){
    echo $salam.",";
    echo "Perkenalan, nama Saya ".$nama."<br/>";
    echo "Senang berkenalan dengan Anda<br/>";
}
perkenalan("Hamdana", "Hallo");

echo"<br/>";

$saya = "Elok";
$ucapanSalam = "Selamat pagi";

perkenalan($saya, $ucapanSalam);
?>