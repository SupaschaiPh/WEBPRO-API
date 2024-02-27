<?php
include "../hearder.php";
include "../generalFn.php";
include "../middleware.php";
include "../lib/role.php";

try {
    echo json_encode(getRoles());
} catch (Throwable $th) {
    http_response_code(503);
}

    

