<?php
include "../hearder.php";
include "../generalFn.php";
include "../middleware.php";
include "../lib/order.php";


try {
    $offset = null;
    $limit = null;
    $filters = null;
    if(key_exists("offset",$_GET)){
        $offset = $_GET["offset"];
    }
    if(key_exists("limit",$_GET)){
        $limit = $_GET["limit"];
    }
    if (key_exists("filters", $_GET) && is_array($_GET["filters"])) {
        $filters = json_encode($_GET["filters"], true);
    }
    //Logic here
    echo json_encode(getOrder($limit,$offset,$filters));
} catch (Throwable $th) {
    if (strcmp(CONFIG["SHOW_DEBUG"],"true") == 0) {
        echo $th;
    } else {
        http_response_code(503);
    }
}
