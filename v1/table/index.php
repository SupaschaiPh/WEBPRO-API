<?php
include "../hearder.php";
include "../generalFn.php";
include "../middleware.php";
include "../lib/table.php";

try {
    $offset = null;
    $limit = null;
    if (key_exists("offset", $_GET)) {
        $offset = $_GET["offset"];
    }
    if (key_exists("limit", $_GET)) {
        $limit = $_GET["limit"];
    }
    //Logic here
    if (isset($_SESSION["uinfo"]["role"]) && strcmp($_SESSION["role"], "customer") != 1) {
        echo json_encode(getTables($limit, $offset));
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
