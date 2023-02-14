<?php
require_once BASE_PATH.'/controllers/getController.php';

$columns = $_GET['columns'] ?? '*';
$orderBy = $_GET['orderBy'] ?? null;
$orderMode = $_GET['orderMode'] ?? null;

if(isset($_GET['in']) && isset($_GET['equal'])){
    $response = GetController::getDataFilter($table, $columns, $_GET['in'], $_GET['equal'], $orderBy, $orderMode);
}else{
    $response = GetController::getData($table, $columns, $orderBy, $orderMode);
}

echo json_encode($response);