<?php
require_once BASE_PATH.'/controllers/getController.php';

$columns = $_GET['columns'] ?? '*';
$orderBy = $_GET['orderBy'] ?? null;
$orderMode = $_GET['orderMode'] ?? null;
$startAt = $_GET['startAt'] ?? null;
$endAt = $_GET['endAt'] ?? null;

if(isset($_GET['in']) && isset($_GET['equal'])){
    $response = GetController::getDataFilter($table, $columns, $_GET['in'], $_GET['equal'], $orderBy, $orderMode, $startAt, $endAt);
}else{
    $response = GetController::getData($table, $columns, $orderBy, $orderMode, $startAt, $endAt);
}

echo json_encode($response);