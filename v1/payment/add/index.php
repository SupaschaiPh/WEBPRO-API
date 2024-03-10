<?php
include "../../hearder.php";
include "../../generalFn.php";
include "../../middleware.php";
include "../../lib/payment.php";
try {
    checkRequirekeyQuery($_POST, array("bill_id", "evidence","paid_to"));
    $_POST = bodyCanNull($_POST, array("paid_date"));
   
    if (addPayment($_POST["bill_id"], $_POST["evidence"], $_POST["paid_to"], $_POST["paid_date"])) {
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
