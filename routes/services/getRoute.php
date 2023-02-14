<?php
require_once BASE_PATH.'/controllers/getController.php';

if(isset($_GET['in']) && isset($_GET['equal'])){
    $response = GetController::getDataFilter($table, $columns, $_GET['in'], $_GET['equal']);
}else{
    $response = GetController::getData($table, $columns);
}

echo json_encode($response);