<?php
include "../../hearder.php";
include "../../generalFn.php";
include "../../middleware.php";
include "../../lib/order.php";
try {
    checkRequirekeyQuery($_POST, array("id"));
    $_POST = bodyCanNull($_POST, array("table_id", "status","waiter_id", "order_by", "description", "price", "discount"));
    $order_by = $_POST["order_by"];
    if ($_POST["order_by"]==null && isset($_SESSION["uinfo"]) && isset($_SESSION["uinfo"]["id"])) {
        $order_by = $_SESSION["uinfo"]["id"];
    }
    if (editOrderBill($_POST["id"],$_POST["table_id"], $_POST["description"], $_POST["status"], $_POST["waiter_id"], $order_by , $_POST["price"], $_POST["discount"])) {
        echo json_encode(
            array(
                "status" => "success"
            )
        );
    } else {
        echo json_encode(
            array(
                "status" => "fail",
                "message" => "pls check payload datas type are correct?, table_id, waiter_id,order_by or status(order_status) not match or don't have anything changed"
            )
        );
    }
} catch (Throwable $th) {
    if (strcmp(CONFIG["SHOW_DEBUG"], "ture") == 0) {
        echo $th;
    } else {
        http_response_code(503);
    }
}
