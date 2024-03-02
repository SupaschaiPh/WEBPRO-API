<?php
include "../../hearder.php";
include "../../generalFn.php";
include "../../middleware.php";
include "../../lib/user.php";



try {
    checkRequirekeyQuery($_POST, array("id", "name", "lastname","role","active"));
    $res = editUser($_POST["id"], $_POST["name"], $_POST["lastname"], $_POST["tel"],$_POST["role"], $_POST["active"]);
    if ($res){
        echo json_encode(
            array(
                "status" => "succress"
            )
        );
    }
    else{
        if( $_POST["active"] == 1 || $_POST["active"] == 0){
            echo json_encode(array(
                "status" => "fail",
                "mss" => "uid not found  or role not match"
            ));
        }else{
            echo json_encode(array(
                "status" => "fail",
                "mss" => "active must be [0](unactive)  or [1](active) only"
            ));
        }
    }
} catch (Throwable $th) {
    if (strcmp(CONFIG["SHOW_DEBUG"], "true")) {
        echo $th;
    } else {
        http_response_code(503);
    }
}
