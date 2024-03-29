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
Routing::post('search', 'ProjectController');
Routing::get('like','ProjectController');
Routing::get('dislike','ProjectController');
Routing::get('showSong','ProjectController');
Routing::get('profile','ProjectController');
Routing::get('profileSettings','ProjectController');
Routing::get('admin','ProjectController');

Routing::run($path);