<?php
header('Content-Type:file');
if (array_key_exists("file", $_GET)) {
    try {
        $file = fopen("upload/" . $_GET["file"], "r");
        echo fread($file, filesize("upload/" . $_GET["file"]));
        fclose($file);
    } catch (Exception $e) {
        die("Cannot Read File");
    }
} else {
    http_response_code(404);
}
//die("Permission denine");
