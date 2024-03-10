<?php
include "../../../hearder.php";
include "../../../generalFn.php";
include "../../../middleware.php";
include "../../../lib/table.php";
try {
    checkRequirekeyQuery($_POST, array("table_type"));
    $_POST = bodyCanNull($_POST, array( "no_can_receive", "time_limit","new_table_type"));
    if (editTableType($_POST["table_type"], $_POST["no_can_receive"], $_POST["time_limit"], $_POST["new_table_type"])) {
        echo json_encode(
            array(
                "status" => "success"
            )
        );
    } else {
        if (is_int($_POST["no_can_receive"]) && (is_float($_POST["time_limit"]) || is_int($_POST["time_limit"]) )) {
            echo json_encode(
                array(
                    "status" => "fail",
                    "message" => "table_type not found or payload incorrect"
                )
            );
        }else{
            echo json_encode(
                array(
                    "status" => "fail",
                    "message" => "no_can_receive must be int  and time_limit must be float"
                )
            );
        }
    }
} catch (Throwable $th) {
    if (strcmp(CONFIG["SHOW_DEBUG"], "ture")) {
        echo $th;
    } else {
        http_response_code(503);
    }
}
