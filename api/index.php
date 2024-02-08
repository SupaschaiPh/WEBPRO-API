<?php
header('Content-Type: application/json; charset=utf-8');
//header('Access-Control-Allow-Origin: *');
?>
<?php
    echo json_encode(array(
        "status" => 200,
        "msg" => "Ok",
    ));
?>
