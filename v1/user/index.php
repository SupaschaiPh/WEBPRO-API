<?php
include "../hearder.php";
include "../generalFn.php";
include "../middleware.php";
include "../lib/header.php";
include "../lib/user.php";



try {
    $offset = null;
    $limit = null;
    if(key_exists("offset",$_GET)){
        $offset = $_GET["offset"];
    }
    if(key_exists("limit",$_GET)){
        $limit = $_GET["limit"];
    }
    echo json_encode(getUsers($limit,$offset));
} catch (Throwable $th) {
    if (strcmp(CONFIG["SHOW_DEBUG"],"ture")) {
        echo $th;
    } else {
        http_response_code(503);
    }
}

    

