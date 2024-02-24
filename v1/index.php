<?php

include "./hearder.php";

define("CONFIG", parse_ini_file("../config.ini"));
try {
    $conn = mysqli_connect(CONFIG["HOST"], CONFIG["DB_USERNAME"], CONFIG["DB_PASSWORD"],CONFIG["DB_MAIN_NAME"]);
    if (mysqli_connect_error()) {
        echo json_encode(array("error"=>"mysql gone away"));
        http_response_code(503);
    }
    echo json_encode(array("status"=>"ok"));
    mysqli_close($conn);
} catch (Throwable $th) {
    http_response_code(503);
}

    

