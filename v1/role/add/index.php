<?php
include "../../hearder.php";
include "../../generalFn.php";
include "../../middleware.php";
include "../../lib/role.php";
try {
    checkRequirekeyQuery($_POST,array("name", "desc"));
    if(addRole($_POST["name"],$_POST["desc"])){
        echo json_encode(array_merge(
            array(
                "status" => "success"
            )
        ));
    }
} catch (Throwable $th) {
    if (strcmp(CONFIG["SHOW_DEBUG"], "ture")) {
        echo $th;
    } else {
        http_response_code(503);
    }
}
