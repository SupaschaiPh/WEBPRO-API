<?php

include "../../hearder.php";
include "../../generalFn.php";
include_once "../../middleware.php";
include_once "../../lib/employee.php";
try{
$checkSum = null;
$bill_id = 2;
if (isset($_SESSION["uinfo"]) && isset($_SESSION["uinfo"]["id"])) {
    if (isset($_SESSION["latest_insert_bill_id"])) {
        $bill_id = $_SESSION["latest_insert_bill_id"];
    }
    $employeeCheck = getEmployees(1, 0, json_encode(array(array(
        "key" => "id",
        "type" => "equal",
        "filter" => $_SESSION["uinfo"]["id"] . ""
    ))));
    if ($employeeCheck && isset($employeeCheck["data"][0]["e_name"])) {
        $sa = $employeeCheck["data"][0]["e_name"] . $employeeCheck["data"][0]["e_lastname"] . $employeeCheck["data"][0]["start_date"] . $bill_id;
        $sa = $_SESSION["uinfo"]["id"] . $sa;
        $checkSum = password_hash($sa, PASSWORD_DEFAULT);
    }
}
$link = ("http://" . $_SERVER["HTTP_HOST"] . "/v1/payment/pay/?bill_id=" . $bill_id . "&pay_to=" . $_SESSION["uinfo"]["id"] . "&checksum=" . $checkSum);
//$qrUrl = "https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=".$link;

//echo file_get_contents($qrUrl);
//echo "<img src='".$qrUrl."' />";
//echo "<a href=".urldecode($link).">".urldecode($link)."</a>";
//echo  "<p>".$sa."</p>";
echo json_encode(
    array(
        "status" =>"success",
        "link" => urldecode($link)
    )
);
}catch (\Throwable $th){
    echo json_encode(
        array(
            "status" =>"fail",
            "status" =>"you are not employee or something went wrong"
        )
    );
}
