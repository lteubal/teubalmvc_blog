<?php

session_start();
// Load config file
require_once '../config/config.php';


// Autoload classes from lib, models and controllers
spl_autoload_register(function ($nombre_clase) {
    if(file_exists('../lib/' . $nombre_clase . '.php')) {
        require_once '../lib/' .$nombre_clase . '.php';
    } elseif(file_exists(APPDIR . '/models/' . $nombre_clase . '.php')) {
        require_once APPDIR . '/models/' .$nombre_clase . '.php';
    }  elseif(file_exists(APPDIR . '/controllers/' . $nombre_clase . '.php')) {
        require_once APPDIR . '/controllers/' .$nombre_clase . '.php';
    }
});

// http routing
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if($_GET) {
         $route = new Dispatch($_GET['url'],'');
    } else {
        $route = new Dispatch('/','');
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
     $route = new Dispatch($_GET['url'], $_POST);
}

require_once '../bootstrap/routes.php';
