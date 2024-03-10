<?php
include "../../hearder.php";
include "../../generalFn.php";
include "../../middleware.php";
include "../../lib/menu.php";
try {
    checkRequirekeyQuery($_POST, array("id"));
    if (editMenu($_POST["id"],null,null,null,null,null,0)) {
        echo json_encode(
            array(
                "status" => "success"
            )
        );
    } else {
        echo json_encode(
            array(
                "status" => "fail",
                "message" => "you can not remove this menu, pls check menu id"
            )
        );
    }
} catch (Throwable $th) {
    if (strcmp(CONFIG["SHOW_DEBUG"], "ture")==0) {
        echo $th;
    } else {
        http_response_code(503);
    }
}
