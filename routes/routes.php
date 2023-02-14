<?php
$routesArray = explode("/", $_SERVER['REQUEST_URI']);
$indexPathAPI = count(array_filter($routesArray)) - DEEP_PROJECT;

$table = $routesArray[$indexPathAPI + DEEP_PROJECT];

if($indexPathAPI === 0){
    $response = array(
        'status' => 404,
        'result' => 'Not Found'
    );

    echo json_encode($response);
}else if($indexPathAPI === 1 && isset($_SERVER['REQUEST_METHOD'])){
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
            require_once BASE_PATH.'/controllers/getController.php';
            $response = GetController::getData($table);
            echo json_encode($response);
            return;
    }
}
