<?php
header('Content-Type: application/json; charset=utf-8',true,200);
//header("Allow: GET, POST, OPTIONS, PUT, DELETE");
define("FRONTEND_URL", parse_ini_file(__DIR__ . "/../config.ini")["FRONTEND_URL"]);

header('Access-Control-Allow-Origin: '.FRONTEND_URL,true); 
if(isset($_SERVER["HTTP_ORIGIN"])){
    header('Access-Control-Allow-Origin: '.$_SERVER["HTTP_ORIGIN"],true); 
}
//header('Access-Control-Allow-Origin: * '); 
//header("Referrer-Policy: no-referrer");
header('Access-Control-Allow-Credentials: true'); 
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS'); 
header('Access-Control-Allow-Headers:  X-Requested-With,Content-Type, Authorization, Accept ,  Content-Length, Accept-Encoding, X-CSRF-Token');
//error_reporting(0);
//mysqli_report(0);
