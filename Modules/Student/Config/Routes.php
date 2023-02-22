<?php

namespace Modules\Student\Config;

$routes->group('api', ['namespace' => 'Modules\Student\Controllers'], function ($routes) {
    $routes->get("/", "StudentController::index");
    $routes->get("create", "StudentController::create");
    $routes->pos("store", "StudentController::store");
    $routes->get("edit/(:num)", "StudentController::edit/$1");
    $routes->put("update", "StudentController::update");
    $routes->delete("delete/(:num)", "StudentController::delete/$1");
});
