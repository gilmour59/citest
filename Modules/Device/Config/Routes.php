<?php

namespace Modules\Device\Config;

$routes->group('device', ['namespace' => 'Modules\Device\Controllers'], function ($routes) {
    $routes->get("/", "DeviceController::index");
    /* $routes->get("create", "StudentController::create");
    $routes->post("store", "StudentController::store");
    $routes->get("edit/(:num)", "StudentController::edit/$1");
    $routes->put("update", "StudentController::update");
    $routes->delete("delete", "StudentController::delete"); */
});
