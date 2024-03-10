<?php
include "../../../hearder.php";
include "../../../generalFn.php";
include "../../../middleware.php";
include "../../../lib/menu.php";
try {
    checkRequirekeyQuery($_POST,array("menu_type"));
    $_POST = bodyCanNull($_POST,array("new_menu_type", "desc"));
    if(editMenuType($_POST["menu_type"],$_POST["desc"],$_POST["new_menu_type"])){
        echo json_encode(
            array(
                "status" => "success"
            )
        );
    }else{
        echo json_encode(
            array(
                "status" => "fail",
                "message"=>"menu_type not match , don't have anything change"
            )
        );
    }
} catch (Throwable $th) {
    if (strcmp(CONFIG["SHOW_DEBUG"], "ture") == 0) {
        echo $th;
    } else {
        http_response_code(503);
    }
}
