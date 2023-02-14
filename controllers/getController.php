<?php
require_once BASE_PATH.'/models/getModel.php';

class GetController{
    public static function getData($table, $columns){
        $model = new GetModel();
        $response = $model->getData($table, $columns);

        $json = array(
            'status' => 200,
            'results' => $response
        );

        return $json;
    }
}