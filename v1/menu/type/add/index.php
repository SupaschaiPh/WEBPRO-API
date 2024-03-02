<?php
include "../../../hearder.php";
include "../../../generalFn.php";
include "../../../middleware.php";
include "../../../lib/menu.php";
try {
    checkRequirekeyQuery($_POST,array("menu_type", "desc"));
    if(addMenuType($_POST["menu_type"],$_POST["desc"])){
        echo json_encode(
            array(
                "status" => "success"
            )
        );
    }else{
        echo json_encode(
            array(
                "status" => "fail",
                "message"=>"may be because duplicate menu_type"
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
