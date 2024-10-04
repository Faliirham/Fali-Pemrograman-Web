<?php
$loremIpsum = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
    Ut tempus ac odio in fermentum. Nunc imperdiet posuere mi, 
    in sodales metus ultricies nec. Maecenas cursus eros odio, vel fermentum enim.";

echo "<p>$loremIpsum</p>";
echo "Panjang Karakter: ".strlen($loremIpsum)."<br>";
echo "Panjang Kata: ".str_word_count($loremIpsum)."<br>";
echo "<p>".strtoupper($loremIpsum)."</p>";
echo "<p>".strtolower($loremIpsum)."</p>";
?>