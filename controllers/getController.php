<?php
require_once BASE_PATH.'/models/getModel.php';

class GetController{
    static public function getDataNoFilter($table, $columns, $orderBy, $orderMode, $startAt, $endAt){
        $model = new GetModel();
        $response = $model->getDataNoFilter($table, $columns, $orderBy, $orderMode, $startAt, $endAt);

        $json = array(
            'status' => 200,
            'results' => $response
        );

        return $json;
    }

    static public function getRelDataNoFilter($table, $columns, $tableRel, $equalRel, $orderBy, $orderMode, $startAt, $endAt){
        $model = new GetModel();
        $response = $model->getRelDataNoFilter($table, $columns, $tableRel, $equalRel, $orderBy, $orderMode, $startAt, $endAt);

        $json = array(
            'status' => 200,
            'results' => $response
        );

        return $json;
    }

    static public function getDataRange($table, $columns, $btwnTo, $min, $max, $in, $equal, $orderBy, $orderMode, $startAt, $endAt){
        $model = new GetModel();
        $response = $model->getDataRange($table, $columns, $btwnTo, $min, $max, $in, $equal, $orderBy, $orderMode, $startAt, $endAt);

        $json = array(
            'status' => 200,
            'results' => $response
        );

        return $json;
    }

    static public function getRelDataFilter($table, $columns, $tableRel, $equalRel, $in, $equal, $orderBy, $orderMode, $startAt, $endAt){
        $model = new GetModel();
        $response = $model->getRelDataFilter($table, $columns, $tableRel, $equalRel, $in, $equal, $orderBy, $orderMode, $startAt, $endAt);

        $json = array(
            'status' => 200,
            'results' => $response
        );

        return $json;
    }

    static public function getDataFilter($table, $columns, $in, $equal, $orderBy, $orderMode, $startAt, $endAt){
        $model = new GetModel();
        $response = $model->getDataFilter($table, $columns, $in, $equal, $orderBy, $orderMode, $startAt, $endAt);

        $json = array(
            'status' => 200,
            'results' => $response
        );

        return $json;
    }
}