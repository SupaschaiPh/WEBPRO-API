<?php
header('Content-Type: application/json; charset=utf-8',true,200);
//header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header('Access-Control-Allow-Origin: http://localhost:3000 '); 
//header('Access-Control-Allow-Origin: * '); 
header('Access-Control-Allow-Credentials: true'); 
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS'); 
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With'); 

