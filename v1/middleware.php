<?php
define("CONFIG", parse_ini_file(__DIR__."/../config.ini"));

if(strcmp($_SERVER["REQUEST_URI"],"/v1/user/") == 0){
    //echo "";
    echo json_encode($_SERVER);

}else if(strcmp($_SERVER["REQUEST_URI"],"/v1/login/") == 0){
    if(strcmp($_SERVER["REQUEST_METHOD"],"POST") != 0){
        http_response_code(405);
        die();
    }
}

session_start();
//setcookie("check",password_hash("demoo",PASSWORD_DEFAULT),time()+60*1);
//echo password_verify("demoo",$_COOKIE["check"])."=" ;
//echo json_encode($_COOKIE);
//echo json_encode($_SERVER["REQUEST_URI"]);
