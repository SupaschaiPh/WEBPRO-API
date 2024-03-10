<?php
include "../hearder.php";
include "../generalFn.php";
include "../middleware.php";

try {
    //Logic Here
    echo json_encode(
        $_SESSION
    );

} catch (Throwable $th) {
    if (strcmp(CONFIG["SHOW_DEBUG"], "true") == 0) {
        echo $th;
    } else {
        http_response_code(503);
    }
}
