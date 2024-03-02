<?php
include "../../hearder.php";
include "../../generalFn.php";
include "../../middleware.php";
include "../../lib/order.php";


try {
    $offset = null;
    $limit = null;
    if(key_exists("offset",$_GET)){
        $offset = $_GET["offset"];
    }
    if(key_exists("limit",$_GET)){
        $limit = $_GET["limit"];
    }
    //Logic here
    echo json_encode(getOrderStatus($limit,$offset));
} catch (Throwable $th) {
    if (strcmp(CONFIG["SHOW_DEBUG"],"true") == 0) {
        echo $th;
    } else {
        echo $th;
        http_response_code(503);
    }
}
