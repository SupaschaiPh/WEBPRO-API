<?php
define("CONFIG", parse_ini_file(__DIR__ . "/../config.ini"));

session_start();

define(
    "GET_ALLOW",
    array(
        "/v1/",
        "/v1/user/",
        "/v1/role/",
        "/v1/menu/",
        "/v1/menu/type/",
        "/v1/employee/",
        "/v1/table/",
        "/v1/table/type/",
        "/v1/table/order/",
        "/v1/order/",
        "/v1/order/status/"
    )
);
define(
    "POST_ALLOW",
    array(
        "/v1/login/",
        "/v1/user/create/",
        "/v1/user/edit/",
        "/v1/role/add/",
        "/v1/role/remove/",
        "/v1/role/edit/",
        "/v1/employee/add/",
        "/v1/employee/edit/",
        "/v1/menu/add/",
        "/v1/menu/edit/",
        "/v1/menu/remove/",
        "/v1/menu/type/add/",
        "/v1/menu/type/edit/",
        "/v1/menu/type/remove/",
        "/v1/table/add/",
        "/v1/table/edit/",
        "/v1/table/type/add/",
        "/v1/order/add/",
        "/v1/order/status/add/"
    )
);

define(
    "AUTH_ROUTE",
    array(
        "/v1/session/"
    )
);

define(
    "STAFF_ROUTE",
    array(
    )
);
$json = file_get_contents("php://input",true);
$json = json_decode($json);
//$_SERVER["REQUEST_URI"] 
//echo json_encode($_POST);

if (in_array(str_replace("index.php","",$_SERVER["SCRIPT_NAME"]), GET_ALLOW)) {
    if (strcmp($_SERVER["REQUEST_METHOD"], "GET") != 0) {
        http_response_code(405);
        die();
    }
    if($json)
    foreach ($json as $key => $value) {
       $_GET[$key] = $value;
    }
}

if (in_array(str_replace("index.php","",$_SERVER["SCRIPT_NAME"]), POST_ALLOW)) {
    if (strcmp($_SERVER["REQUEST_METHOD"], "POST") != 0) {
        http_response_code(405);
        die();
    }
    if($json)
    foreach ($json as $key => $value) {
        $_POST[$key] = $value;
     }
} 

if (in_array(str_replace("index.php","",$_SERVER["SCRIPT_NAME"]), AUTH_ROUTE)) {
    if (!(isset($_SESSION["uinfo"]) && isset($_SESSION["uinfo"]["id"]))) {
        http_response_code(401);
        die();
    }
} 
if (in_array(str_replace("index.php","",$_SERVER["SCRIPT_NAME"]), STAFF_ROUTE)) {
    if (!(isset($_SESSION["uinfo"]) && isset($_SESSION["uinfo"]["role"]) && strcmp($_SESSION["uinfo"]["role"],"staff") == 0)) {
        http_response_code(403);
        die();
    }
} 
//setcookie("check",password_hash("demoo",PASSWORD_DEFAULT),time()+60*1);
//echo password_verify("demoo",$_COOKIE["check"])."=" ;
//echo json_encode($_COOKIE);
//echo json_encode($_SERVER["REQUEST_URI"]);
