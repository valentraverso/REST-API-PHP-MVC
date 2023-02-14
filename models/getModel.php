<?php
require_once BASE_PATH.'/models/connection.php';

class GetModel extends Connection{
    public function getData($table){
        $sqlQuery = $this->con->prepare("SELECT * FROM $table");
        $sqlQuery->execute();

        return $sqlQuery->fetch(PDO::FETCH_ASSOC);
    }
}