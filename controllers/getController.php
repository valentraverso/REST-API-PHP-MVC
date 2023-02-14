<?php
require_once BASE_PATH.'/models/getModel.php';

class GetController{
    static public function getData($table, $columns){
        $model = new GetModel();
        $response = $model->getData($table, $columns);

        $json = array(
            'status' => 200,
            'results' => $response
        );

        return $json;
    }

    static public function getDataFilter($table, $columns, $in, $equal){
        $model = new GetModel();
        $response = $model->getDataFilter($table, $columns, $in, $equal);

        $json = array(
            'status' => 200,
            'results' => $response
        );

        return $json;
    }
}