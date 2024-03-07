<?php
include "../../../hearder.php";
include "../../../generalFn.php";
include "../../../middleware.php";
include "../../../lib/order.php";
include "../../../lib/menu.php";

try {
    checkRequirekeyQuery($_POST, array("id"));
    $_POST = bodyCanNull($_POST, array("order_bill_id", "menu_id", "count", "menu_price", "response_by", "trans_status"));
    $menu_price = null;
    if ($_POST["menu_price"] == null && $_POST["menu_id"] != null ) {
        $menu_price = getMenus(null, null, json_encode(array(
            array(
                "key" => "menu_id",
                "type" => "equal",
                "filter" => $_POST["menu_id"]
            )
        )));
    }
    if ($_POST["menu_id"] == null || (isset($menu_price["data"][0]) && isset($menu_price["data"][0]["price"]) && is_int(intval($menu_price["data"][0]["price"])))) {
        if($_POST["menu_price"] == null && $_POST["menu_id"] != null ){
            $_POST["menu_price"] = intval($menu_price["data"][0]["price"]);
        }
        if (editOrderTransaction($_POST["id"], $_POST["order_bill_id"], $_POST["menu_id"], $_POST["count"],  $_POST["menu_price"], $_POST["response_by"], $_POST["trans_status"])) {
            echo json_encode(
                array(
                    "status" => "success"
                )
            );
        } else {
            echo json_encode(
                array(
                    "status" => "fail",
                    "message" => "pls check payload datas type are correct?, bill_id or menu_id or trans_status not match"
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
        //echo $th;
        http_response_code(503);
    }
}
