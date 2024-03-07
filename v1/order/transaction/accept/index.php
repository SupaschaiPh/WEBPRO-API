<?php
include "../../../hearder.php";
include "../../../generalFn.php";
include "../../../middleware.php";
include "../../../lib/order.php";
include "../../../lib/menu.php";

try {
    checkRequirekeyQuery($_POST, array("id", "trans_status"));
    $_POST = bodyCanNull($_POST, array("response_by"));
    $response_by = $_POST["response_by"];
    if ($_POST["response_by"]==null && isset($_SESSION["uinfo"]) && isset($_SESSION["uinfo"]["id"])) {
        $response_by = $_SESSION["uinfo"]["id"];
    }
    if (editOrderTransaction($_POST["id"], null, null, null, null, $response_by, $_POST["trans_status"])) {
        echo json_encode(
            array(
                "status" => "success"
            )
        );
    } else {
        echo json_encode(
            array(
                "status" => "fail",
                "message" => "id not found trans_status not match or you do not have permission to accept menu"
            )
        );
    }
} catch (Throwable $th) {
    if (strcmp(CONFIG["SHOW_DEBUG"], "ture") == 0) {
        echo $th;
    } else {
        //echo $th;
        http_response_code(503);
    }
}
