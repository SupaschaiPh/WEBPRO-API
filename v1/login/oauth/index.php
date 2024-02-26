<?php
include "./init.php";
$auth_url = $client->createAuthUrl();
session_start();
if(!isset($_SESSION["access_token"])){
header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
}
