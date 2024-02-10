<?php
define("CONFIG", parse_ini_file("../config.ini"));
try{
if (strcmp(constant("CONFIG")["PORT"], "") == 1) {
    $host = constant("CONFIG")["HOST"] . ":" . constant("CONFIG")["PORT"];
} else {
    $host = constant("CONFIG")["HOST"];
}
$user = CONFIG["DB_USERNAME"];
$pass = CONFIG["DB_PASSWORD"];

$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    printf(json_encode($conn));
} else {
    echo "Connected to MySQL server successfully!";
}
}catch(Exception $e){
    http_response_code(503);
}
