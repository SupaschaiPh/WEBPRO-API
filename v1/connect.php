<?php
$conn = mysqli_connect(CONFIG["HOST"], CONFIG["DB_USERNAME"], CONFIG["DB_PASSWORD"],CONFIG["DB_MAIN_NAME"],CONFIG["PORT"] ? intval(CONFIG["PORT"]) : null );


if (mysqli_connect_error()) {
    echo json_encode(array("error" => "mysql gone away"));
    die();
}
