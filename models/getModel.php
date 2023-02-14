<?php
require_once BASE_PATH.'/models/connection.php';

class GetController extends Connection{
    public function getData(){
        $sqlQuery = $this->con->prepare('SELECT * FROM marcas');
        $sqlQuery->execute();

        return $sqlQuery->fetch(PDO::FETCH_ASSOC);
    }
}