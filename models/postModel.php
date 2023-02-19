<?php
require_once BASE_PATH.'/models/connection.php';

class PostModel extends Connection {

    public function postData( $table, $data ) {
        $validateColumns = PostModel::validateInfo($table, $data);
        if ( is_array( $validateColumns ) ) {
             return $validateColumns;
        }

        $columns = "";
        $params = "";

        foreach($data as $key => $value){
            $columns .= "$key,";
            $params .= ":$key,";
        }

        $columns = substr($columns, 0, -1);
        $params = substr($params, 0, -1);

        $postQuery = $this->con->prepare("INSERT INTO $table ($columns) VALUES ($params)");
        foreach($data as $key => $value){
            $postQuery->bindParam(':'.$key, $data[$key]);
        }

        if($postQuery->execute()){
            $response = array(
                'status' => 200,
                'lastId' => $this->con->lastInsertId(),
                'results' => 'Uploaded succesfully'
            );
        }else{
            $response = array(
                'status' => 400,
                'results' => 'Error in upload'
            );
        }

        return $response;
    }

    static private function validateInfo($table, $data){
        $columns = array();

        foreach ( $data as $key => $value ) {
            array_push( $columns, $key );
        }

        $con = new Connection();
        $tableColumnsExistValidator = $con->getColumnsDB($table, $columns);
        
        if (is_array($tableColumnsExistValidator)){
            return $tableColumnsExistValidator;
        }
    }
}