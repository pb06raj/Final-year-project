<?php
//clog.txt text File to read the counter
$datei = fopen("/clog.txt","r");
$count = fgets($datei,1000);
fclose($datei);
$count=$count + 1 ;
//echo "$count" ;
//echo " hits" ;
//echo "\n" ;

$datei = fopen("/clog.txt","w");
fwrite($datei, $count);
fclose($datei);

?>