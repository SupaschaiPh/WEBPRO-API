<?php
include "../../../hearder.php";
include "../../../generalFn.php";
include "../../../middleware.php";
include "../../../lib/table.php";
try {
    checkRequirekeyQuery($_POST, array("table_id", "note"));
    $_POST  = bodyCanNull($_POST, array("receive_id"));
    $receive_id = $_POST["receive_id"];
    if (isset($_SESSION["uinfo"]) && isset($_SESSION["uinfo"]["id"])) {
        $receive_id = $_SESSION["uinfo"]["id"];
    }
    if ($receive_id == null) {
        echo json_encode(
            array(
                "status" => "fail",
                "message" => "receive_id cannot not null"
            )
        );
        die();
    }
    if (orderTable($_POST["table_id"], $_POST["note"], $receive_id)) {
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
