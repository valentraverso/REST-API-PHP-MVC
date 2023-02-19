<?php
require_once BASE_PATH.'/models/connection.php';

$connection = new Connection();
$connection->getColumnsDB($table);