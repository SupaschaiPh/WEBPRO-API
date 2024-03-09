<?php
include "./hearder.php";
include "./middleware.php";
include "./connect.php";
include "./lib/util.php";

try {
    //echo getSQLdatetimeFormat();
    $conn = mysqli_connect(CONFIG["HOST"], CONFIG["DB_USERNAME"], CONFIG["DB_PASSWORD"],CONFIG["DB_MAIN_NAME"],CONFIG["PORT"] ? intval(CONFIG["PORT"]) : null );
    if (mysqli_connect_error()) {
        echo json_encode(array("error"=>"mysql gone away"));
        http_response_code(503);
    }
    echo json_encode(array(
        "status"=>"ok",
        "host"=> substr(CONFIG["HOST"],0,10).str_repeat(".",strlen(CONFIG["HOST"])-10 > 0 ? strlen(CONFIG["HOST"])-10 : 0),
        "db_name"=>substr(CONFIG["DB_MAIN_NAME"],0,5).str_repeat(".",strlen(CONFIG["DB_MAIN_NAME"])-5 > 0 ? strlen(CONFIG["DB_MAIN_NAME"])-5 : 0),
        "port"=>str_repeat(".",strlen(CONFIG["PORT"])),
    ));
    mysqli_close($conn);
} catch (Throwable $th) {
    http_response_code(503);
}

    

