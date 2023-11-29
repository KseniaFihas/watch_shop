<?php

// Use parse_url to parse the URL and get controller and action
$url = parse_url($_SERVER['REQUEST_URI']);
$controllerName = 'HomeController'; // Change this value to the correct controller name
$methodName = 'index'; // Specify the correct method name

// Check if controller file exists
$controllerFileName = $controllerName . '.php';
if (!file_exists('controllers/' . $controllerFileName)) {
    // If not found, display 404 error
    echo "404 Not Found<br>";
    echo "Controller Name: $controllerName<br>";
    echo "Method Name: $methodName<br>";
    die();
}

// Require controller file and instantiate controller object
require_once 'controllers/' . $controllerFileName;
$controller = new $controllerName;

// Check if method exists within controller object
if (!method_exists($controller, $methodName)) {
    // If not found, display 404 error
    echo "404 Not Found<br>";
    echo "Controller Name: $controllerName<br>";
    echo "Method Name: $methodName<br>";
    die();
}

// Call the specified method in the controller
$controller->index();