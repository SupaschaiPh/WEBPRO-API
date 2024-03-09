<?php
include "../../hearder.php";
include "../../generalFn.php";
include "../../middleware.php";
include "../../lib/payment.php";
try {
    checkRequirekeyQuery($_POST, array("id","bill_id" ));
   
    if (deletePayment($_POST["id"],$_POST["bill_id"])) {
        echo json_encode(
            array(
                "status" => "success"
            )
        );
    } else {
        echo json_encode(
            array(
                "status" => "fail",
                "message" => "id or bill_id not found"
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
