<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function setCookie()
    {
        helper('cookie');
        set_cookie([
            'name' => 'token',
            'value' => 'value_of_cookie',
            'expire' => time() + 1000,
            'httponly' => false
        ]);
    }
    
    public function getCookie()
    {
        helper('cookie');
        if (get_cookie('token', true)) {
            echo $_COOKIE['token'];            
        }
    }
}
