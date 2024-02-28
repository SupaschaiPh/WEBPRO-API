<?php

function checkRequirekeyQuery(array $array,array $checkquery){
foreach ($checkquery as $key) {
    if(!key_exists($key,$array)){
        echo json_encode(
            array(
                "status"=>"fail",
                "mss"=>"missing key ".$key." reqiure"
            )
        );
        die();
    }
}
}
