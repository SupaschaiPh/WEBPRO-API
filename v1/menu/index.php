<?php
include "../hearder.php";
include "../generalFn.php";
include "../middleware.php";
include "../lib/menu.php";


try {
    $offset = 0;
    $limit = null;
    $filters = null;
    /*array(array(
        "key"=>"active",
        "filter"=>"1",
        "type"=>"equal"
    ));*/
    if (key_exists("offset", $_GET)) {
        $offset = $_GET["offset"];
    }
    if (key_exists("limit", $_GET)) {
        $limit = $_GET["limit"];
    }
    if (key_exists("filters", $_GET) && is_array($_GET["filters"])) {
        //$filters = array_merge($filters,$_GET["filters"]);
        $filters = json_encode($_GET["filters"], true);
    }
    //$filters = json_encode($filters, true);
    echo json_encode(getMenus($limit, $offset, $filters));
} catch (Throwable $th) {
    if (strcmp(CONFIG["SHOW_DEBUG"], "ture") == 0) {
        echo $th;
    } else {
        echo $th;
        http_response_code(503);
    }
}
