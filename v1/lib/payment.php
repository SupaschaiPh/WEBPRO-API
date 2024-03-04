<?php
include_once __DIR__ . "/../lib/util.php";

function getPayments($limit=null,$offset=0, $filters = null){
    include __DIR__."/../connect.php";
    if($offset<0){$offset=0;}
    if($limit<0){$limit=0;}
    if($limit != null){
        $sql= 'SELECT
        payment.id,
        payment.bill_id,
        order_bill.table_id as "table_id",
        order_bill.description as "order_description",
        order_bill.price as "price",
        payment.paid_date,
        payment.evidence,
        payment.paid_to,
        employee.e_name as "paid_to_name",
        employee.e_lastname as "paid_to_lastname",
        employee.profile_url as "paid_to_profile_url"
    FROM
        `payment`
    JOIN order_bill ON payment.id = order_bill.id
    JOIN employee ON payment.paid_to = employee.id
    ' . filterObjToSQL($conn, $filters) .'
    LIMIT ' . intval($limit) . " OFFSET " . intval($offset) . ";";
    }else{
        $sql= 'SELECT
        payment.id,
        payment.bill_id,
        order_bill.table_id as "table_id",
        order_bill.description as "order_description",
        order_bill.price as "price",
        payment.paid_date,
        payment.evidence,
        payment.paid_to,
        employee.e_name as "paid_to_name",
        employee.e_lastname as "paid_to_lastname",
        employee.profile_url as "paid_to_profile_url"
    FROM
        `payment`
    JOIN order_bill ON payment.id = order_bill.id
    JOIN employee ON payment.paid_to = employee.id' . filterObjToSQL($conn, $filters) .';';
    }
    $res = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
    $maximumlimit = mysqli_fetch_all(mysqli_query($conn, "SELECT count(id) FROM payment " . filterObjToSQL($conn, $filters) . " ;"));
    $hold["data"] = $res;
    $hold["limit"] = $maximumlimit[0][0];
    mysqli_close($conn);
    return $hold;
}
