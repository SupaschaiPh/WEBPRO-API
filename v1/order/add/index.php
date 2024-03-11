<?php
include "../../hearder.php";
include "../../generalFn.php";
include "../../middleware.php";
include "../../lib/order.php";
try {
    checkRequirekeyQuery($_POST, array("table_id", "status"));
    $_POST = bodyCanNull($_POST, array("waiter_id", "order_by", "description", "price", "discount"));
    $order_by = $_POST["order_by"];
    if ($_POST["order_by"]==null && isset($_SESSION["uinfo"]) && isset($_SESSION["uinfo"]["id"])) {
        $order_by = $_SESSION["uinfo"]["id"];
    }
    $res = addOrderBill($_POST["table_id"], $_POST["description"], $_POST["status"], $_POST["waiter_id"], $_POST["order_by"], $_POST["price"], $_POST["discount"]);
    if ($res) {
        echo json_encode(
         array_merge(
             array(
                 "status"=>"success"
             ),
             $res
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
        echo $th;

        http_response_code(503);
    }
}
