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
        "/v1/table/type/"
    )
);
define(
    "POST_ALLOW",
    array(
        "/v1/login/",
        "/v1/user/create/",
        "/v1/role/add/",
        "/v1/table/type/add/",

    )
);

define(
    "AUTH_ROUTE",
    array(
        "/v1/session/",
        "/v1/user/",
        "/v1/user/create/",
        "/v1/role/add/",
        "/v1/table/type/add/"
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
//setcookie("check",password_hash("demoo",PASSWORD_DEFAULT),time()+60*1);
//echo password_verify("demoo",$_COOKIE["check"])."=" ;
//echo json_encode($_COOKIE);
//echo json_encode($_SERVER["REQUEST_URI"]);
