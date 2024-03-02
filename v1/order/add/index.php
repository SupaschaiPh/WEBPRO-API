<?php
include "../../hearder.php";
include "../../generalFn.php";
include "../../middleware.php";
include "../../lib/order.php";
try {
    checkRequirekeyQuery($_POST, array("table_id", "status"));
    $_POST = bodyCanNull($_POST, array("waiter_id", "order_by", "description", "price", "discount"));
    if (addOrderBill($_POST["table_id"], $_POST["description"], $_POST["status"], $_POST["waiter_id"], $_POST["order_by"], $_POST["price"], $_POST["discount"])) {
        echo json_encode(
            array(
                "status" => "success"
            )
        );
    } else {
        echo json_encode(
            array(
                "status" => "fail",
                "message" => "pls check payload datas type are correct?, table_id or status(order_status) not match"
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
