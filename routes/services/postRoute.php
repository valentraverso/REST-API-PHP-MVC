<?php
require_once BASE_PATH.'/controllers/postController.php';

if(isset($_POST)){
    $response = PostController::postData($table, $_POST);
}