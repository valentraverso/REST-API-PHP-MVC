<?php
$routesArray = explode("/", $_SERVER['REQUEST_URI']);
$indexPathAPI = count(array_filter($routesArray)) - DEEP_PROJECT;

$table = explode('?', $routesArray[$indexPathAPI + DEEP_PROJECT])[0];

if($indexPathAPI === 0){
    $response = array(
        'status' => 404,
        'result' => 'Not Found'
    );

    echo json_encode($response);
}else if($indexPathAPI === 1 && isset($_SERVER['REQUEST_METHOD'])){
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
            include_once BASE_PATH.'/routes/services/getRoute.php';
            break;
    }
}
