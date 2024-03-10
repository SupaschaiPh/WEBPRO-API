<?php
include "./init.php";
include "../../middleware.php";

$auth_url = $client->createAuthUrl();
if(!isset($_SESSION["access_token"])){
header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
}else{
    header('Location: '.(isset(CONFIG["FRONTEND_URL"]) ? CONFIG["FRONTEND_URL"] : "/"));

}
