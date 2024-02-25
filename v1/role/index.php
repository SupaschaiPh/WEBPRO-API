<?php
include "../hearder.php";
include "../generalFn.php";
include "../middleware.php";


define("CONFIG", parse_ini_file("../../config.ini"));


try {
    include "../connect.php";
    if (mysqli_connect_error()) {
        echo json_encode(array("error"=>"mysql gone away"));
    }
    $sql = "SELECT * FROM user_role";

    echo json_encode(mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC));
    mysqli_close($conn);
} catch (Throwable $th) {
    http_response_code(503);
}

    

