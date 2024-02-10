<?php
header('Content-Type:file');

$file = fopen("./test.txt","r");
echo fread($file,filesize("./test.txt"));
fclose($file);
//die("Permission denine");
?>
