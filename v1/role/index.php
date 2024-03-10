<?php
include "../hearder.php";
include "../generalFn.php";
include "../middleware.php";
include "../lib/role.php";

try {
    echo json_encode(getRoles());
} catch (Throwable $th) {
    if (strcmp(CONFIG["SHOW_DEBUG"], "ture")) {
        echo $th;
    } else {
        http_response_code(503);
    }
}
