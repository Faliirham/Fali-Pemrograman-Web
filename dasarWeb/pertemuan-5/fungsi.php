<?php 
function perkenalan($nama, $salam="Assalaualaikum"){
    echo $salam.",";
    echo "Perkenalkan, nama Saya ".$nama."<br/>";
    echo "Senang berkenalkan dengan Anda<br/>";
}
perkenalan("Hamdana", "Hallo");

echo"<br/>";

$saya = "Elok";
$ucapanSalam = "Selamat pagi";

perkenalan($saya, $ucapanSalam);

perkenalan($saya);
?>