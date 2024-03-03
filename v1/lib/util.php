<?php
function setOrNull($conn, $query)
{
    if (!isset($query) || strcmp($query, "") == 0) {
        return "NULL";
    }
    return "'" . mysqli_real_escape_string($conn, $query) . "'";
}

function getSQLdatetimeFormat()
{
    $timestamp = time();
    $dateTime = new DateTime("@$timestamp");
    $sqlDatetime = $dateTime->format('Y-m-d H:i:s');
    return "'".$sqlDatetime."'";
}

function filterObjToSQL($conn, $filterObjStr)
{
    if (!$filterObjStr) return "";
    $filterObjStr = json_decode($filterObjStr,true);
    $whereClause = "";
    $isFirstFilter = true;
    foreach ($filterObjStr as $filter) {
        $filterField = mysqli_real_escape_string($conn, $filter['key']);
        $filterValue = $filter['filter'];
        $filterType = "";

        if (!$isFirstFilter) {
            $whereClause .= " AND ";
        }
        if(isset( $filter['type'])){
            $filterType  = $filter['type'];
            switch ($filterType) {
                case 'equal':
                    $whereClause .= "$filterField = ".mysqli_real_escape_string($conn,$filterValue)."";
                    break;
                case 'in':
                    $whereClause .= "$filterField IN ".mysqli_real_escape_string($conn,$filterValue)."";
                    break;
                case 'notin':
                    $whereClause .= "$filterField NOT IN ".mysqli_real_escape_string($conn,$filterValue)."";
                    break;
                case 'is':
                    $whereClause .= "$filterField IS ".mysqli_real_escape_string($conn,$filterValue)."";
                    break;
                case 'null':
                    $whereClause .= "$filterField IS NULL";
                    break;
                case 'notnull':
                    $whereClause .= "$filterField IS NOT NULL";
                    break;
                default:
                    break;
            }
        }
        else if(isset($filterValue)){
            $whereClause .= "$filterField LIKE '%".mysqli_real_escape_string($conn,$filterValue)."%'";
        }else{
            $whereClause .= "$filterField IS NULL";
        }
        $isFirstFilter = false;
    }
    if ($whereClause) {
        $whereClause = " WHERE $whereClause";
    } else {
        $whereClause = "";
    }
    return $whereClause;
}

function sortObjToSQL($conn, $sortobjStr)
{
    if (!$sortobjStr) return "";
    $sortobjStr = json_decode($sortobjStr,true);
    $orderBy = "";
    $isFirstSort = true;
    foreach ($sortobjStr as $sort) {
        $sortField = mysqli_real_escape_string($conn, $sort['key']);
        $sortDirection = mysqli_real_escape_string($conn, $sort['sort'] === 'asc' ? 'ASC' : 'DESC');
        if (!$isFirstSort) {
            $orderBy .= ", ";
        }
        $orderBy .= "$sortField $sortDirection";
        $isFirstSort = false;
    }
    if ($orderBy) {
        $orderBy = " ORDER BY $orderBy";
    } else {
        $orderBy = "";
    }
    return $orderBy;
}

function setSQLSet($conn,$sqlStr,$key,$val){
    if(isset($val) || $val!=null){
        if(isset($sqlStr) && strcmp($sqlStr,"")!=0){ $sqlStr .= ","; }
        $sqlStr .= "`". mysqli_real_escape_string($conn, $key) ."` = '" . mysqli_real_escape_string($conn, $val) . "'";
    }
    return $sqlStr;
}
