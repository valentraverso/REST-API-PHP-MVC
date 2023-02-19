<?php
$header = getallheaders();

if(!isset($header['Auth']) || $header['Auth'] !== API_KEY){
    echo 'NOT API KEY';
    http_response_code(401);
    die();
}

$routesArray = explode("/", $_SERVER['REQUEST_URI']);
$indexPathAPI = count(array_filter($routesArray)) - DEEP_PROJECT;

$table = explode('?', $routesArray[$indexPathAPI + DEEP_PROJECT])[0];

if($indexPathAPI === 0){
    $error = array(
        'status' => 404,
        'result' => 'You need to add the name of a table'
    );

    echo json_encode($response);
}else if($indexPathAPI === 1 && isset($_SERVER['REQUEST_METHOD'])){
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
            include_once BASE_PATH.'/routes/services/getRoute.php';
            break;
        case 'POST':
            include_once BASE_PATH.'/routes/services/postRoute.php';
            break;
        case 'PUT':
            include_once BASE_PATH.'/routes/services/putRoute.php';
            break;
        case 'DELETE':
            include_once BASE_PATH.'/routes/services/deleteRoute.php';
            break;
    }

    if(isset($response)){
        echo json_encode( $response, http_response_code($response['status'])  );
    }else{
        $error = array(
            'status' => 404,
            'result' => 'Something went wrong :('
        );

        echo json_encode( $error, http_response_code($error['status'])  );
    }
}
