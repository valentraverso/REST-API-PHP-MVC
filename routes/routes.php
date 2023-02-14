<?php
$routesArray = explode("/", $_SERVER['REQUEST_URI']);
$indexPathAPI = count(array_filter($routesArray)) - DEEP_PROJECT;

print_r($indexPathAPI);
