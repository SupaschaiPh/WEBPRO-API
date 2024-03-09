<?php
include "../../hearder.php";
include "../../generalFn.php";
include "../../middleware.php";
include "../../lib/payment.php";
include "../../lib/employee.php";

try {
    checkRequirekeyQuery($_GET, array("bill_id", "pay_to", "checksum"));

    $employeeCheck = getEmployees(1, 0, json_encode(array(array(
        "key" => "id",
        "type" => "equal",
        "filter" => $_GET["pay_to"]
    ))));
    $sa = $_GET["pay_to"] . $employeeCheck["data"][0]["e_name"] . $employeeCheck["data"][0]["e_lastname"] . $employeeCheck["data"][0]["start_date"] . $_GET["bill_id"];
    //echo $sa;
    //echo "\n".$_GET["checksum"];
    if ($employeeCheck && password_verify($sa, $_GET["checksum"])) {
        //$checkSum = password_hash($sa.$_SESSION["uinfo"]["id"],PASSWORD_DEFAULT);
        if (intval(getPayments(1, 0, json_encode(array(
            array(
                "key" => "bill_id",
                "type" => "equal",
                "filter" => $_GET["bill_id"]
            )
        )))["limit"]) <= 0) {
            $evidence = "pay to " . $_GET["pay_to"] . " by qrcode or link @ " . date("Y.m.d H:i:s");
            if (addPayment($_GET["bill_id"], $evidence, $_GET["pay_to"], null)) {
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
        } else {
            echo json_encode(
                array(
                    "status" => "fail",
                    "message" => "this bill already paid, or not found bill id"
                )
            );
        }
    } else {
        echo json_encode(
            array(
                "status" => "fail",
                "message" => "permission denine"
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
