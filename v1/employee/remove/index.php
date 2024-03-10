<?php
include "../../hearder.php";
include "../../generalFn.php";
include "../../middleware.php";
include "../../lib/employee.php";



try {
    checkRequirekeyQuery($_POST, array("id"));
    
    $res = editEmployee($_POST["id"], null, null, null, null,null,null,date("Y-m-d H:i:s"),null);
    if ($res)
        echo json_encode(
            array(
                "status" => "succress"
            )
        );
    else
        echo json_encode(array(
            "status" => "fail",
            "mss" => "id not found or don't have anything change"
        ));
} catch (Throwable $th) {
    if (strcmp(CONFIG["SHOW_DEBUG"], "true")) {
        echo $th;
    } else {
        http_response_code(503);
    }
}
