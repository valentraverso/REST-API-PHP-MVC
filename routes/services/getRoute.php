<?php
require_once BASE_PATH.'/controllers/getController.php';

$columns = $_GET[ 'columns' ] ?? '*';
$orderBy = $_GET[ 'orderBy' ] ?? null;
$in = $_GET[ 'in' ] ?? null;
$equal = $_GET[ 'equal' ] ?? null;
$orderMode = $_GET[ 'orderMode' ] ?? null;
$startAt = $_GET[ 'startAt' ] ?? null;
$endAt = $_GET[ 'endAt' ] ?? null;

if ( isset( $_GET[ 'tableRel' ] ) && isset( $_GET[ 'equalRel' ] ) && isset( $in ) && isset( $equal ) ) {

    $response = GetController::getRelDataFilter( $table, $columns, $_GET[ 'tableRel' ], $_GET[ 'equalRel' ], $in, $equal, $orderBy, $orderMode, $startAt, $endAt );

} else if ( isset( $in ) && isset( $equal ) ) {

    $response = GetController::getDataFilter( $table, $columns, $_GET[ 'in' ], $_GET[ 'equal' ], $orderBy, $orderMode, $startAt, $endAt );

} else if ( isset($_GET['btwnTo']) && isset( $_GET['min'] ) && isset($_GET['max']) && !isset( $_GET[ 'tableRel' ] ) && !isset( $_GET[ 'equalRel' ] )) {

    $response = GetController::getDataRange($table, $columns, $_GET['btwnTo'], $_GET['min'], $_GET['max'], $in, $equal, $orderBy, $orderMode, $startAt, $endAt);

}else if ( isset( $_GET[ 'tableRel' ] ) && isset( $_GET[ 'equalRel' ] ) && !isset( $in ) && !isset( $equal ) ) {

    $response = GetController::getRelDataNoFilter( $table, $columns, $_GET[ 'tableRel' ], $_GET[ 'equalRel' ], $orderBy, $orderMode, $startAt, $endAt );

} else {

    $response = GetController::getDataNoFilter( $table, $columns, $orderBy, $orderMode, $startAt, $endAt );

}

echo json_encode( $response );