<?php
include "../../../hearder.php";
include "../../../generalFn.php";
include "../../../middleware.php";
include "../../../lib/review.php";
try {
    checkRequirekeyQuery($_POST,array("review_q_id", "answer","fav_score"));
    $_POST = bodyCanNull($_POST,array("review_by","order_id","submit_date"));
    if(addReivewAns($_POST["review_q_id"],json_encode($_POST["answer"]),$_POST["fav_score"],$_POST["submit_date"],$_POST["review_by"],$_POST["order_id"])){
        echo json_encode(
            array(
                "status" => "success"
            )
        );
    }else{
        echo json_encode(
            array(
                "status" => "fail",
                "message"=>"something went wrong"
            )
        );
    }
} catch (Throwable $th) {
    if (strcmp(CONFIG["SHOW_DEBUG"], "ture")) {
        echo $th;
    } else {

        http_response_code(503);
    }
}
