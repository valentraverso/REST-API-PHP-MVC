<?php
require_once BASE_PATH.'/models/getModel.php';

class GetController{
    static public function getDataNoFilter($table, $columns, $orderBy, $orderMode, $startAt, $endAt){
        $model = new GetModel();
        $response = $model->getDataNoFilter($table, $columns, $orderBy, $orderMode, $startAt, $endAt);
        
        $json = GetController::response($response);

        return $json;
    }

    static public function getRelDataNoFilter($table, $columns, $tableRel, $equalRel, $orderBy, $orderMode, $startAt, $endAt){
        $model = new GetModel();
        $response = $model->getRelDataNoFilter($table, $columns, $tableRel, $equalRel, $orderBy, $orderMode, $startAt, $endAt);

        $json = GetController::response($response);

        return $json;
    }

    static public function getDataRange($table, $columns, $btwnTo, $min, $max, $in, $equal, $orderBy, $orderMode, $startAt, $endAt, $tableRel, $equalRel){
        $model = new GetModel();
        $response = $model->getDataRange($table, $columns, $btwnTo, $min, $max, $in, $equal, $orderBy, $orderMode, $startAt, $endAt, $tableRel, $equalRel);

        $json = GetController::response($response);

        return $json;
    }

    static public function getRelDataFilter($table, $columns, $tableRel, $equalRel, $in, $equal, $orderBy, $orderMode, $startAt, $endAt){
        $model = new GetModel();
        $response = $model->getRelDataFilter($table, $columns, $tableRel, $equalRel, $in, $equal, $orderBy, $orderMode, $startAt, $endAt);

        $json = GetController::response($response);

        return $json;
    }

    static public function getDataFilter($table, $columns, $in, $equal, $orderBy, $orderMode, $startAt, $endAt){
        $model = new GetModel();
        $response = $model->getDataFilter($table, $columns, $in, $equal, $orderBy, $orderMode, $startAt, $endAt);

        $json = GetController::response($response);

        return $json;
    }

    static protected function response($response){
        if(is_array($response) && !empty($response[0])){
            $json = array(
                'status' => 404,
                'results' => $response[1]
            );
        }else if(is_array($response)){
            $json = array(
                'status' => 200,
                'count' => count($response),
                'results' => $response
            );
        }else{
            $json = array(
                'status' => 404,
                'results' => 'Not Found'
            );
        }

        return $json;
    }
}