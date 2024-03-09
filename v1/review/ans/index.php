<?php
include "../../hearder.php";
include "../../generalFn.php";
include "../../middleware.php";
include "../../lib/review.php";
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
    echo json_encode(getReviewsAns($limit,$offset,$filters));
} catch (Throwable $th) {
    if (strcmp(CONFIG["SHOW_DEBUG"],"true") == 0) {
        echo $th;
    } else {
        http_response_code(503);
    }
}
