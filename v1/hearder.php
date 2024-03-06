<?php
header('Content-Type: application/json; charset=utf-8',true,200);
//header("Allow: GET, POST, OPTIONS, PUT, DELETE");
define("FRONTEND_URL", parse_ini_file(__DIR__ . "/../config.ini")["FRONTEND_URL"]);
header('Access-Control-Allow-Origin: '.FRONTEND_URL); 
//header('Access-Control-Allow-Origin: * '); 
header('Access-Control-Allow-Credentials: true'); 
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS'); 
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With'); 

//error_reporting(0);
