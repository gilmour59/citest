<?php

namespace Modules\Student\Config;

$routes->group('api', ['namespace' => 'Modules\Student\Controllers'], function ($routes) {
    $routes->get("student", "StudentController::index");    
});
