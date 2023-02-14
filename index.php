<?php 
require_once './config.php';

require_once './models/getController.php';

$result = new GetController();
print_r($result->getData());