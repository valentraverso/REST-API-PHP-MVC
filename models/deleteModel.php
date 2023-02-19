<?php
require_once BASE_PATH.'/models/connection.php';
require_once BASE_PATH.'/controllers/getController.php';

class DeleteModel extends Connection {

    public function deleteData( $table, $colId, $id ) {
        $validateColumns = DeleteModel::validateInfo($table, $colId, $id );
        if ( is_array( $validateColumns ) ) {
             return $validateColumns;
        }

        $deleteQuery = $this->con->prepare("DELETE FROM $table WHERE $colId = :$colId");
        $deleteQuery->bindParam(':'.$colId, $id);

        
        if($deleteQuery->execute()){
            $response = array(
                'status' => 200,
                'results' => 'Delete succesfully'
            );
        }else{
            $response = array(
                'status' => 400,
                'results' => 'Error while deleting'
            );
        }

        return $response;
    }

    static private function validateInfo($table, $colId, $id){
        $checkExistence = GetController::getDataFilter($table, '*', $colId, $id, null, null, null, null);

        if ($checkExistence['status'] === 404){
            return array(
                'status' => 400,
                'results' => 'Couldn\'t find records with this ID',
            );
        }
    }
}