<?php
define("CONFIG", parse_ini_file(__DIR__."/../config.ini"));

session_start();
//setcookie("check",password_hash("demoo",PASSWORD_DEFAULT),time()+60*1);
//echo password_verify("demoo",$_COOKIE["check"])."=" ;
//echo json_encode($_COOKIE);
//echo json_encode($_SERVER["REQUEST_URI"]);
