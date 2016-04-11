<?php

use IvanKovalev\app\lib\Router;

$_SESSION['url'] = $_SERVER['REQUEST_URI'];

/*
|--------------------------------------------------------------------------
| router
|--------------------------------------------------------------------------
|you can bind the simple rout the following way -> router::add('method[GET or POST]','url','name+Controller','ControllerMethod');
|or you can bind it like this -> router::restfulResource('url','name+Controller');
|
*/
//user auth routs
Router::add('GET', '/', 'UserAuthentication', 'welcome');
Router::add('GET', '/UserAuthentication/login', 'UserAuthentication', 'login');
Router::add('GET', '/UserAuthentication/logout', 'UserAuthentication', 'logout');
Router::add('GET', '/UserAuthentication/registration', 'UserAuthentication', 'registration');

//
Router::add('GET', '/HandsUp', 'HandsUp', 'handsUp');
//
Router::add('GET', '/SelectStudent', 'SelectStudent', 'selectStudent');
//
Router::add('GET', '/WriteResult', 'WriteResult', 'writeResult');

Router::add('GET', '/Monitoring', 'Monitoring', 'monitoring');


/*
|--------------------------------------------------------------------------
| watcher
|--------------------------------------------------------------------------
|This method is watching the address bar:
|1: If the requested address exists, it calls binding to this url Comptroller and Comptroller method
|2: If not it returns exception;
|
|
*/
router::watcher();


