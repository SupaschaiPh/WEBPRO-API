<?php
include "../hearder.php";
include "../generalFn.php";
include "../middleware.php";

try {
    session_destroy();
    echo json_encode(
        array(
            "status" => "success"
        )
    );
    die();
} catch (\Throwable $th) {
    echo json_encode(
        array(
            "status" => "fail",
            "mss" => "something went wrong"
        )
    );
    die();
}
