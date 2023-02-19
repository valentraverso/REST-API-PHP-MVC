<?php
require_once BASE_PATH.'/models/connection.php';
require_once BASE_PATH.'/controllers/getController.php';

class PutModel extends Connection {

    public function putData( $table, $data, $colId, $id ) {
        $validateColumns = PutModel::validateInfo($table, $data, $colId, $id);
        if ( is_array( $validateColumns ) ) {
             return $validateColumns;
        }

        $set = "";

        foreach($data as $key => $value){
            $set .= "$key = :$key,";
        }

        $set = substr($set, 0, -1);

        $putQuery = $this->con->prepare("UPDATE $table SET $set WHERE $colId = :$colId");
        foreach($data as $key => $value){
            $putQuery->bindParam(':'.$key, $data[$key]);
        }
        $putQuery->bindParam(':'.$colId, $id);

        if($putQuery->execute()){
            $response = array(
                'status' => 200,
                'results' => 'Update succesfully'
            );
        }else{
            $response = array(
                'status' => 400,
                'results' => 'Error in the update'
            );
        }

        return $response;
    }

    static private function validateInfo($table, $data, $colId, $id){
        $checkExistence = GetController::getDataFilter($table, '*', $colId, $id, null, null, null, null);

        if ($checkExistence['status'] === 404){
            return array(
                'status' => 400,
                'results' => 'Couldn\'t find records with this ID',
            );
        }

        $columns = array();

        foreach ( $data as $key => $value ) {
            array_push( $columns, $key );
        }

        array_push($columns, $colId);

        $columns = array_unique($columns);

        $con = new Connection();
        $tableColumnsExistValidator = $con->getColumnsDB($table, $columns);
        
        if (is_array($tableColumnsExistValidator)){
            return $tableColumnsExistValidator;
        }
    }
}