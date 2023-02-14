<?php
require_once BASE_PATH.'/models/connection.php';

class GetModel extends Connection {
    public function getData( $table, $columns, $orderBy, $orderMode, $startAt, $endAt) {
        
        $query = "SELECT $columns FROM $table";

        if ( $orderBy !== null && $orderMode !== null && $startAt === null && $endAt === null ) {
            $query = "SELECT $columns FROM $table ORDER BY $orderBy $orderMode";
        } else if($orderBy === null && $orderMode === null && $startAt !== null && $endAt !== null ){
            $query = "SELECT $columns FROM $table LIMIT $startAt, $endAt";
        } else if($orderBy !== null && $orderMode !== null && $startAt !== null && $endAt){
            $query = "SELECT $columns FROM $table ORDER BY $orderBy $orderMode LIMIT $startAt, $endAt";
        }

        $sqlQuery = $this->con->prepare( $query );
        $sqlQuery->execute();

        return $sqlQuery->fetch( PDO::FETCH_ASSOC );
    }

    public function getDataFilter( $table, $columns, $in, $equal, $orderBy, $orderMode, $startAt, $endAt) {
        $arrayIn = explode( ',', $in );
        $arrayEqual = explode( '_', $equal );

        if ( count( $arrayIn ) > 1 ) {
            foreach ( $arrayIn as $key => $value ) {
                $andQuery = 'AND '. $value . ' = :' . $value . ' ';
            }
        } else {
            $andQuery = '';
        }

        $query = "SELECT $columns FROM $table WHERE $arrayIn[0] = :$arrayIn[0] $andQuery";

        if ( $orderBy !== null && $orderMode !== null && $startAt === null && $endAt === null ) {
            $query = "SELECT $columns FROM $table WHERE $arrayIn[0] = :$arrayIn[0] $andQuery ORDER BY $orderBy $orderMode";
        } else if ( $orderBy === null && $orderMode === null && $startAt !== null && $endAt !== null ) {
            $query = "SELECT $columns FROM $table WHERE $arrayIn[0] = :$arrayIn[0] $andQuery LIMIT $startAt, $endAt";
        } else if ( $orderBy !== null && $orderMode !== null && $startAt !== null && $endAt !== null ) {
            $query = "SELECT $columns FROM $table WHERE $arrayIn[0] = :$arrayIn[0] $andQuery ORDER BY $orderBy $orderMode LIMIT $startAt, $endAt";
        }

        $sqlQuery = $this->con->prepare( $query );
        foreach ( $arrayIn as $key => $value ) {
            $sqlQuery->bindParam( ':'.$value, $arrayEqual[ $key ], PDO::PARAM_STR );
        }
        $sqlQuery->execute();

        return $sqlQuery->fetch( PDO::FETCH_ASSOC );
    }
}