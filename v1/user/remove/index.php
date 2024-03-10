<?php
include "../../hearder.php";
include "../../generalFn.php";
include "../../middleware.php";
include "../../lib/user.php";



try {
    checkRequirekeyQuery($_POST, array("id"));
    //$_POST = array_merge($_POST,bodyCanNull($_POST, array("name", "lastname","role","active","tel")));
    $res = editUser($_POST["id"], null, null, null, null, 0);
    if ($res) {
        echo json_encode(
            array(
                "status" => "succress"
            )
        );
    } else {

        echo json_encode(array(
            "status" => "fail",
            "mss" => "uid not found"
        ));
    }
} catch (Throwable $th) {
    if (strcmp(CONFIG["SHOW_DEBUG"], "true")) {
        echo $th;
    } else {
        http_response_code(503);
    }
}
