<?php
define("CONFIG",parse_ini_file("../config.ini"));

if(strcmp(constant("CONFIG")["PORT"],"") == 1){
$host = constant("CONFIG")["HOST"].":".constant("CONFIG")["PORT"];
}else{
$host = constant("CONFIG")["HOST"];
}
$user = 'root';
$pass = "12345";
 
$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    printf(json_encode($conn));
} else {
    echo "Connected to MySQL server successfully!";
}
?>
