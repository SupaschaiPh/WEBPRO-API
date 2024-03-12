<?php
include "../../../hearder.php";
include "../../../generalFn.php";
include "../../../middleware.php";
include "../../../lib/table.php";
try {
    checkRequirekeyQuery($_POST, array( "id" ));
    $_POST  = bodyCanNull($_POST, array("table_id","receive_id", "order_status","end_date","note", "start_date"));
   
    if (
        !(strtotime($_POST["start_date"]) && ( $_POST["end_date"]==null||strtotime($_POST["end_date"])))
    ) {
        echo json_encode(
            array(
                "status" => "fail",
                "message" => "id not found or don't have any chaned"
            )
        );
        die();
    }
    if (editTableOrder($_POST["id"],$_POST["table_id"], $_POST["note"], $_POST["receive_id"], $_POST["start_date"], $_POST["end_date"], $_POST["order_status"])) {
        echo json_encode(
            array(
                "status" => "success"
            )
        );
    } else {
        echo json_encode(
            array(
                "status" => "fail",
                "message" => "table_id or receive_id not match or payload incorrect type"
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
