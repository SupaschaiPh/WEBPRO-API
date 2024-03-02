<?php
header('Content-Type: image/png,jpg,jpeg,webp');

$link = urlencode("http://".$_SERVER["HTTP_HOST"]."?payid=".rand(1,100));
$qrUrl = "https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=".$link;

echo file_get_contents($qrUrl);
//echo "<img src='".$qrUrl."' />";
