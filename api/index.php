<?php
header('Content-Type: application/json; charset=utf-8');
//header('Access-Control-Allow-Origin: *');
?>
<?php
    print(json_encode(array(
        "status" => 200,
        "msg" => "Ok",
    )));
?>
