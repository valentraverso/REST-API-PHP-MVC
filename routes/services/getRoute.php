<?php
require_once BASE_PATH.'/controllers/getController.php';

$columns = $columns ?? '*';

$response = GetController::getData($table, $columns);
echo json_encode($response);