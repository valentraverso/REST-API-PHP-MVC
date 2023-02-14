<?php
require_once BASE_PATH.'/models/getModel.php';

class GetController{
    public static function getData($table){
        $model = new GetModel();
        $response = $model->getData($table);

        $json = array(
            'status' => 200,
            'results' => $response
        );

        return $json;
    }
}