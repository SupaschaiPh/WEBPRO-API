<?php
include "./util.php";

function regisEmployee($id,$name,$lastname,$address,$duty){
    include __DIR__ . "/../connect.php";
    try{        
        $sql = "INSERT INTO `employee`(
            `id`,
            `name`,
            `lastname`,
            `duty`,
            `address`,
            `start_date`,
        )
        VALUES(
            '".mysqli_real_escape_string($conn,$id)."',
            ".setOrNull($conn,$name).",
            ".setOrNull($conn,$lastname).",
            ".setOrNull($conn,$duty).",
            ".setOrNull($conn,$address).",
            ".getSQLdatetimeFormat().",
        )";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        return true;
    }catch (\Throwable $th) {
        mysqli_close($conn);
        return false;
    }
}
