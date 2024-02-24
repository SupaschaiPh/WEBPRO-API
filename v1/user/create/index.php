<?php
include "../../hearder.php";
include "../../generalFn.php";
include "../../middleware.php";



define("CONFIG", parse_ini_file("../../../config.ini"));
$RequireQuery = array("email", "password", "name", "lastname");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    checkRequirekeyQuery($_POST, $RequireQuery);

    try {
        $conn = mysqli_connect(CONFIG["HOST"], CONFIG["DB_USERNAME"], CONFIG["DB_PASSWORD"], CONFIG["DB_MAIN_NAME"]);
        if (mysqli_connect_error()) {
            echo json_encode(array("error" => "mysql gone away"));
        }
        $sql = "
    INSERT INTO `user` (`id`, `email`, `password`, `role`, `name`, `lastname`, `tel`, `active`) 
    VALUES (
        uuid(), 
        '" . mysqli_real_escape_string($conn, $_POST["email"]) . "', 
        '" . mysqli_real_escape_string($conn, $_POST["password"]) . "', 
        'customer',
        '" . mysqli_real_escape_string($conn, $_POST["name"]) . "', 
        '" . mysqli_real_escape_string($conn, $_POST["lastname"]) . "',
        " . (key_exists("tel", $_POST) ? ("'" . mysqli_real_escape_string($conn, $_POST["tel"]) . "'") : "NULL" ). ",
        '1');
    ";
        mysqli_query($conn, $sql);
        $sql = "SELECT id FROM `user` WHERE `email`='" . mysqli_real_escape_string($conn, $_POST["email"])."'";
        echo mysqli_fetch_all(mysqli_query($conn,$sql))[0][0];
        mysqli_close($conn);
    } catch (Throwable $th) {
        if(CONFIG["SHOW_DEBUG"]){
            echo $th;
        }else{
            http_response_code(503);
        }
    }
}
