<?php
require_once BASE_PATH.'/models/connection.php';

class GetModel extends Connection{
    public function getData($table, $columns){
        $sqlQuery = $this->con->prepare("SELECT $columns FROM $table");
        $sqlQuery->execute();

        return $sqlQuery->fetch(PDO::FETCH_ASSOC);
    }

    public function getDataFilter($table, $columns, $in, $equal){
        $arrayIn = explode(',', $in);
        $arrayEqual = explode('_', $equal);

        if(count($arrayIn) > 1){
            foreach($arrayIn as $key => $value){
                $andQuery = 'AND '. $value . ' = :' . $value . ' ';
            }
        }else{
            $andQuery = "";
        }

        $query = "SELECT $columns FROM $table WHERE $arrayIn[0] = :$arrayIn[0] $andQuery";

        $sqlQuery = $this->con->prepare($query);
        foreach($arrayIn as $key => $value){
            $sqlQuery->bindParam(":".$value, $arrayEqual[$key], PDO::PARAM_STR);
        }
        $sqlQuery->execute();
        
        return $sqlQuery->fetch(PDO::FETCH_ASSOC);
    }
}