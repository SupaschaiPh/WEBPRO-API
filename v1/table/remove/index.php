<?php
include "../../hearder.php";
include "../../generalFn.php";
include "../../middleware.php";
include "../../lib/table.php";
try {
    checkRequirekeyQuery($_POST,array("table_id"));
    //$_POST  = bodyCanNull($_POST,array("table_type","position_x","position_y","priority","table_status"));
    if(editTableInfo($_POST["table_id"],null,null,null,null,null,0)){
        echo json_encode(
            array(
                "status" => "success"
            )
        );
    }else{
        echo json_encode(
            array(
                "status" => "fail",
                "message"=>"table_id not found or don't have anything changed"
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
