<?php

function checkRuirekeyQuery(array $query,array $checkquery){
foreach ($checkquery as $key) {
    if(!key_exists($key,$query)){
        echo "Error Missing query ".$key." has been require. ";
        die();
    }
}
}
