<?php
include "../hearder.php";
include "../generalFn.php";
include "../middleware.php";
include "../lib/table.php";

try {
    $offset = 0;
    $limit = null;
    $filters = null;
    if(key_exists("offset",$_GET)){
        $offset = $_GET["offset"];
    }
    if(key_exists("limit",$_GET)){
        $limit = $_GET["limit"];
    }
    if(key_exists("filters",$_GET)){
        $filters = $_GET["filters"];
        $filters = json_encode($filters,true);
    }
    //Logic here
    if (isset($_SESSION["uinfo"]) && strcmp($_SESSION["uinfo"]["role"], "customer") != 0) {
        echo json_encode(getTables($limit, $offset,$filters));
    } else {
        echo json_encode(getTableInfo($limit, $offset));
    }
} catch (Throwable $th) {
    if (strcmp(CONFIG["SHOW_DEBUG"], "true")) {
        echo $th;
    } else {
        http_response_code(503);
    }
}
