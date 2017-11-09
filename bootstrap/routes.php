<?php

// RESTful routing example
$route->get('/','Home','index');

$route->get('posts','Posts','index');
$route->get('posts/new','Posts','new1');
$route->post('posts','Posts','create');
$route->get('posts/id','Posts','show');
$route->get('posts/id/edit','Posts','edit');
$route->patch('posts/id','Posts','update');
$route->delete('posts/id','Posts','destroy');

$route->get('users/login','Users','login');
$route->get('users/logout','Users','logout');
$route->get('users/register','Users','register');
$route->post('users/index','Users','index');
$route->get('users/index','Users','index');
