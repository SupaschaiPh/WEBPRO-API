<?php
include_once __DIR__ . "/../lib/util.php";

function getReviewsAns($limit = null, $offset = 0,$filters = null)
{
    include __DIR__ . "/../connect.php";
    if ($offset < 0) {
        $offset = 0;
    }
    if ($limit < 0) {
        $limit = 0;
    }
    if ($limit != null) {
        $sql = "SELECT * FROM `review_answer` " . filterObjToSQL($conn, $filters) . "  LIMIT " . intval($limit) . " OFFSET " . intval($offset) . ";";
    } else {
        $sql = "SELECT * FROM `review_answer` " . filterObjToSQL($conn, $filters) . " ;";
    }
    $res = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);
    $maximumlimit = mysqli_fetch_all(mysqli_query($conn, "SELECT count(id) FROM review_answer " . filterObjToSQL($conn, $filters) . " ;"));
    $hold["data"] = $res;
    $hold["limit"] = $maximumlimit[0][0];
    mysqli_close($conn);
    return $hold;
}

function addReivewAns($review_id,$answer,$fav_score,$review_by=null,$submit_date = null,$order_id=null){
   
    include __DIR__ . "/../connect.php";
    try {
        $sql="INSERT INTO `review_answer`(
                    `id`,
                    `review_id`,
                    `review_by`,
                    `order_id`,
                    `answer`,
                    `submit_date`,
                    `fav_score`
                )
                VALUES(
                    NULL,
                    '".mysqli_real_escape_string($conn,$review_id)."',
                    ".setOrNull($conn,$review_by).",
                    ".setOrNull($conn,$order_id).",
                    '".mysqli_real_escape_string($conn,$answer)."',
                    ".($submit_date != null ? "'".$submit_date."'" : getSQLdatetimeFormat()).",
                    ".setOrNull($conn,$fav_score)."
                )";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        return true;
    } catch (\Throwable $th) {
        mysqli_close($conn);
        return false;
    }
    
}
