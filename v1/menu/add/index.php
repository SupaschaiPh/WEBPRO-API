<?php
include "../../hearder.php";
include "../../generalFn.php";
include "../../middleware.php";
include "../../lib/menu.php";
try {
    $img_url = "";
    if (key_exists("img_url", $_POST)) {
        $img_url = $_POST["img_url"];
    } else {
        $file_url_path = uploadFileHandler("/../../bucket/upload/menu");
        if ($file_url_path) {
            $img_url = $file_url_path;
        }
    }
    checkRequirekeyQuery($_POST, array("title", "description", "price", "type"));
    if (addMenu($_POST["title"], $_POST["description"], $_POST["price"], $img_url, $_POST["type"])) {
        echo json_encode(
            array(
                "status" => "success"
            )
        );
    } else {
        echo json_encode(
            array(
                "status" => "fail",
                "message" => "pls check payload data type is it correct? or menu_type not match"
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
