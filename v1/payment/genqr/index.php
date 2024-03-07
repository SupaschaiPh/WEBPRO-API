<?php
//header('Content-Type: image/png,jpg,jpeg,webp',true);
include "../../middleware.php";
include "../../lib/employee.php";
$checkSum = null;
$bill_id = 0;
if(isset($_SESSION["uinfo"])&&isset($_SESSION["uinfo"]["id"])){
    if(isset($_SESSION["latest_insert_bill_id"])){
        $bill_id = $_SESSION["latest_insert_bill_id"];
    }
    $employeeCheck = getEmployees(1,0,json_encode(array(array(
        "key"=>"id",
        "type"=>"equal",
        "filter"=>$_SESSION["uinfo"]["id"].""
    ))));
    if($employeeCheck){
        $sa = $employeeCheck["data"][0]["e_name"].$employeeCheck["data"][0]["e_lastname"].$employeeCheck["data"][0]["start_date"].$bill_id;
        $sa = $_SESSION["uinfo"]["id"].$sa;
        $checkSum = password_hash($sa,PASSWORD_DEFAULT);
    }
}
$link = urlencode("http://".$_SERVER["HTTP_HOST"]."/v1/payment/pay/?bill_id=".$bill_id."&pay_to=".$_SESSION["uinfo"]["id"]."&checksum=".$checkSum);
$qrUrl = "https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=".$link;

//echo file_get_contents($qrUrl);
echo "<img src='".$qrUrl."' />";
echo "<a href=".urldecode($link).">".urldecode($link)."</a>";
//echo  "<p>".$sa."</p>";


