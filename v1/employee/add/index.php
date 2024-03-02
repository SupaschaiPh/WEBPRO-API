<?php
include "../../hearder.php";
include "../../generalFn.php";
include "../../middleware.php";
include "../../lib/employee.php";



try {
    checkRequirekeyQuery($_POST, array("id", "name", "lastname","address","duty"));
    $res = regisEmployee($_POST["id"], $_POST["name"], $_POST["lastname"], $_POST["lastname"], $_POST["duty"]);
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
