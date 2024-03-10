<?php
include "../../hearder.php";
include "../../generalFn.php";
include "../../middleware.php";
include "../../lib/role.php";
try {
    checkRequirekeyQuery($_POST,array("name"));
    $_POST =bodyCanNull($_POST,array( "desc","new_name"));
    if(editRole($_POST["name"],$_POST["desc"],$_POST["new_name"])){
        echo json_encode(
            array(
                "status" => "success"
            )
        );
    }else{
        echo json_encode(
            array(
                "status" => "fail",
                "message"=>"role name not match, not have anything edited"
            )
        );
    }
} catch (Throwable $th) {
    if (strcmp(CONFIG["SHOW_DEBUG"], "ture")) {
        echo $th;
    } else {
        http_response_code(503);
    }
}
