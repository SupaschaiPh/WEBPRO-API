<?php
include "../hearder.php";
include "../generalFn.php";
include "../middleware.php";


define("CONFIG", parse_ini_file("../../config.ini"));


try {
    $conn = mysqli_connect(CONFIG["HOST"], CONFIG["DB_USERNAME"], CONFIG["DB_PASSWORD"],CONFIG["DB_MAIN_NAME"]);
    if (mysqli_connect_error()) {
        echo json_encode(array("error"=>"mysql gone away"));
    }
    $sql = "SELECT * FROM user_role";

    echo json_encode(mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC));
    mysqli_close($conn);
} catch (Throwable $th) {
    http_response_code(503);
}

    

