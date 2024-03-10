<?php
include "../../hearder.php";
include "../../generalFn.php";
include "../../middleware.php";
include "../../lib/table.php";
try {
    checkRequirekeyQuery($_POST,array("table_type"));
    $_POST  = bodyCanNull($_POST,array("position_x","position_y","priority","table_status"));
    if(addTable($_POST["table_type"],$_POST["position_x"],$_POST["position_y"],$_POST["priority"],$_POST["table_status"])){
        echo json_encode(
            array(
                "status" => "success"
            )
        );
    }else{
        echo json_encode(
            array(
                "status" => "fail",
                "message"=>"table_type or table_status not match , position_x or position_y or priority are wrong type"
            )
        );
    }
} catch (Throwable $th) {
    if (strcmp(CONFIG["SHOW_DEBUG"], "ture")) {
        echo $th;
    } else {
        http_response_code(503);
    }
}
