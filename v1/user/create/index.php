<?php
include "../../hearder.php";
include "../../generalFn.php";
$RequireQuery = array("email","password","name","lastname");

define("CONFIG", parse_ini_file("../../../config.ini"));

checkRuirekeyQuery($_POST,$RequireQuery);

try {
    $conn = mysqli_connect(CONFIG["HOST"], CONFIG["DB_USERNAME"], CONFIG["DB_PASSWORD"],CONFIG["DB_MAIN_NAME"]);
    if (mysqli_connect_error()) {
        echo json_encode(array("error"=>"mysql gone away"));
    }
    $sql = "
    INSERT INTO `user` (`id`, `email`, `password`, `role`, `name`, `lastname`, `tel`, `active`) 
    VALUES (
        uuid(), 
        '".mysqli_real_escape_string($conn,$_POST["email"])."', 
        '".mysqli_real_escape_string($conn,$_POST["password"])."', 
        'customer',
        '".mysqli_real_escape_string($conn,$_POST["name"])."', 
        '".mysqli_real_escape_string($conn,$_POST["lastname"])."',
        ".key_exists("tel",$_POST) ? "'".mysqli_real_escape_string($conn,$_POST["tel"])."'" : "NULL" .",
        '1');
    ";
    echo json_encode(mysqli_query($conn,$sql));
    mysqli_close($conn);
} catch (Throwable $th) {
    http_response_code(503);
}

    

