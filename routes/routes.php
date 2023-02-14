<?php
$routesArray = explode("/", $_SERVER['REQUEST_URI']);
$indexPathAPI = count(array_filter($routesArray)) - 1;

echo $indexPathAPI;