<?php
include "../../hearder.php";
include "../../generalFn.php";
include "../../middleware.php";
include "../../lib/employee.php";



try {
    $img_url = "";
    if (key_exists("profile_url", $_POST)) {
        $img_url = $_POST["profile_url"];
    } else {
        $file_url_path = uploadFileHandler("/../../bucket/upload/employee/");
        if ($file_url_path) {
            $img_url = $file_url_path;
        }
    }

    checkRequirekeyQuery($_POST, array("id", "name", "lastname", "address", "duty"));
    //$_POST = bodyCanNull($_POST,array( "salary","profile_url"));
    
    $res = regisEmployee($_POST["id"], $_POST["name"], $_POST["lastname"], $_POST["address"], $_POST["duty"], $_POST["salary"], $img_url);
    if ($res)
        echo json_encode(
            array(
                "status" => "succress"
            )
        );
    else
        echo json_encode(array(
            "status" => "fail",
            "mss" => "duplicate id or not found id on user table"
        ));
} catch (Throwable $th) {
    if (strcmp(CONFIG["SHOW_DEBUG"], "true")) {
        echo $th;
    } else {
        http_response_code(503);
    }
}
