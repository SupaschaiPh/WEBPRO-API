<?php

function getTables($limit=null,$offset=0){
    include __DIR__."/../connect.php";
    if($offset<0){$offset=0;}
    if($limit<0){$limit=0;}

    if($limit != null){
        $sql = "SELECT * FROM table_info LEFT OUTER JOIN table_order USING (table_id) LIMIT ".intval($limit)." OFFSET ".intval($offset).";";
    }else{
        $sql = "SELECT * FROM table_info LEFT OUTER JOIN table_order USING (table_id);";
    }
    $res = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
    mysqli_close($conn);
    return $res;
}

function getTableInfo($limit=null,$offset=0){
    include __DIR__."/../connect.php";
    if($offset<0){$offset=0;}
    if($limit<0){$limit=0;}

    if($limit != null){
        $sql = "SELECT * FROM table_info LIMIT ".intval($limit)." OFFSET ".intval($offset).";";
    }else{
        $sql = "SELECT * FROM table_info;";
    }
    $res = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
    mysqli_close($conn);
    return $res;
}
