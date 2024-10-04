<?php 
function perkenalan($nama, $salam){
    echo $salam.",";
    echo "Perkenalkan, nama saya Fali".$nama>" <br/>";
    echo "Senang berkenalan dengan anda<br/>";
}
perkenalan("Hmadana, Hallo");

echo"<br/>";

$saya = "Elok";
$ucapanSalam = "Selamat pagi";

perkenalan($saya, $ucapanSalam);
?>