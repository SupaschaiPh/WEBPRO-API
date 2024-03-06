<?php
include "../../../hearder.php";
include "../../../generalFn.php";
include "../../../middleware.php";
include "../../../lib/order.php";


try {
    checkRequirekeyQuery($_POST,array("order_status"));
    $_POST = bodyCanNull($_POST,array("description","new_order_status","active"));
    if(editOrderStatus($_POST["order_status"],$_POST["description"],$_POST["new_order_status"],$_POST["active"])){
        echo json_encode(
            array(
                "status" => "success"
            )
        );
    }else{
        echo json_encode(
            array(
                "status" => "fail",
                "message"=>"order_status not found or payload are incorrect type or don't have anything changed"
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
