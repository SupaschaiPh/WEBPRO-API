<?php
include "../../../hearder.php";
include "../../../generalFn.php";
include "../../../middleware.php";
include "../../../lib/order.php";
include "../../../lib/menu.php";

try {
    checkRequirekeyQuery($_POST, array("order_bill_id", "menu_id", "count"));
    $_POST = bodyCanNull($_POST, array("response_by"));
    $menu_price = getMenus(null, null, json_encode(array(
        array(
            "key" => "menu_id",
            "type" => "equal",
            "filter" => $_POST["menu_id"]
        )
    )));
    if (isset($menu_price["data"][0]) && isset($menu_price["data"][0]["price"]) && is_int(intval($menu_price["data"][0]["price"]))) {

        if (addOrederTransaction($_POST["order_bill_id"], $_POST["menu_id"], $_POST["count"], intval($menu_price["data"][0]["price"]), $_POST["response_by"])) {
            echo json_encode(
                array(
                    "status" => "success"
                )
            );
        } else {
            echo json_encode(
                array(
                    "status" => "fail",
                    "message" => "pls check payload datas type are correct?, bill_id or menu_id not match"
                )
            );
        }
    } else {
        echo json_encode(
            array(
                "status" => "fail",
                "message" => "menu_id not match"
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
