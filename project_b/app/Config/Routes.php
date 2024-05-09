<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->setDefaultNamespace('App\Controllers');
 $routes->setDefaultController('Home');
 $routes->setDefaultMethod('index');
 $routes->setTranslateURIDashes(false);
 $routes->set404Override();
$routes->get('/', 'Home::index');


// $routes->get('/login','UserLoginController::login');

// $routes->match(['get','post'],'/testA','Web\V1\UserLoginController::login',['filter' => 'noauth']);
// echo "vnhu"; die;

$namespaceWebV1 = 'Web\V1';

$routes->match(['get','post'],'/sign_in',$namespaceWebV1.'\UserLoginController::signIn');
$routes->match(['get','post'], '/sign_up',$namespaceWebV1.'\UserRegisterController::signUp');

$routes->match(['get','post'],'/login',$namespaceWebV1.'\UserLoginController::login');
$routes->match(['get','post'],'/logout',$namespaceWebV1.'\UserLoginController::logout');


$routes->match(['get','post'], '/register',$namespaceWebV1.'\UserRegisterController::registration');
$routes->match(['get','post'],'/dashboard',$namespaceWebV1.'\UserDashboardController::dashboard',['filter' => 'auth']);
$routes->match(['get','post'], '/update/(:any)',$namespaceWebV1.'\UserUpdateController::update/$1',['filter' => 'auth']);
$routes->match(['get','post'], '/delete/(:any)',$namespaceWebV1.'\UserDeleteController::delete/$1',['filter' => 'auth']);
$routes->match(['get','post'], '/terms',$namespaceWebV1.'\UserDashboardController::terms',['filter' => 'auth']);
$routes->match(['get','post'], '/seeder',$namespaceWebV1.'\UserDashboardController::inserDummyData',['filter' => 'auth']);

// if(is_file(APPPATH . 'Config/'). ENVIRONMENT . '/Routes.php'){
//     require APPPATH . 'Config/'. ENVIRONMENT . '/Routes.php';
// }
//C:\xampp\htdocs\codeIgniter\project_b\app\Config\Routes.php
