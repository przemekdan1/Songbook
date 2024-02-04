<?php

require 'Routing.php';


$path = trim($_SERVER['REQUEST_URI'],'/');
$path = parse_url( $path, PHP_URL_PATH);

Routing::get('','DefaultController');
Routing::get('index','DefaultController');
Routing::get('projects','ProjectController');
Routing::post('login','SecurityController');
Routing::post('addProjects','ProjectController');
Routing::post('register', 'SecurityController');

Routing::run($path);