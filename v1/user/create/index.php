<?php
include "../../hearder.php";
include "../../generalFn.php";
include "../../middleware.php";




$RequireQuery = array("email", "password", "name", "lastname");
checkRequirekeyQuery($_POST, $RequireQuery);
try {

    echo json_encode(array_merge(
        createUser($_POST["email"], $_POST["password"], $_POST["name"], $_POST["password"], $_POST["tel"]),
        array(
            "status" => "succress"
        )
    ));
} catch (Throwable $th) {
    if (strcmp(CONFIG["SHOW_DEBUG"],"ture")) {
        echo $th;
    } else {
        http_response_code(503);
    }
}
