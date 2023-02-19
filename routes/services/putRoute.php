<?php
require_once BASE_PATH.'/controllers/putController.php';

if(isset($_GET['colId']) && isset($_GET['id'])){
    parse_str(file_get_contents('php://input'), $data);

    $response = PutController::PutData($table, $data, $_GET['colId'], $_GET['id']);
}else if(empty($_GET['colId'])){
    $response = array(
        'status' => 400,
        'results' => 'Need to specify a column to UPDATE the table'
    );
}else{
    $response = array(
        'status' => 400,
        'results' => 'Need to specify an id to UPDATE the table'
    );
}