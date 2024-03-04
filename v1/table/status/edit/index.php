<?php
include "../../../hearder.php";
include "../../../generalFn.php";
include "../../../middleware.php";
include "../../../lib/table.php";

try {
    checkRequirekeyQuery($_POST,array("table_status"));
    $_POST = bodyCanNull($_POST,array("table_status_desc","new_table_status"));
    if(editTableStatus($_POST["table_status"],$_POST["table_status_desc"],$_POST["new_table_status"])){
        echo json_encode(
            array(
                "status" => "success"
            )
        );
    }else{
        echo json_encode(
            array(
                "status" => "fail",
                "message"=>"table_status not found or payload are incorrect type or don't have anything changed"
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
