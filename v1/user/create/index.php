<?php
include "../../hearder.php";
include "../../generalFn.php";
include "../../middleware.php";
include "../../lib/user.php";



try {
    checkRequirekeyQuery($_POST, array("email", "password", "name", "lastname"));
    $res = createUser($_POST["email"], $_POST["password"], $_POST["name"], $_POST["lastname"], $_POST["tel"]);
    if ($res)
        echo json_encode(array_merge(
            $res,
            array(
                "status" => "succress"
            )
        ));
    else
        echo json_encode(array(
            "status" => "fail",
            "mss" => "This usename may haved in DB"
        ));
} catch (Throwable $th) {
    if (strcmp(CONFIG["SHOW_DEBUG"], "true")) {
        echo $th;
    } else {
        http_response_code(503);
    }
}
