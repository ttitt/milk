<?php

namespace app\admin\controller;

use Milk\Controller;
use Milk\Db;
use Milk\Middleware;
use Milk\Session;
use Milk\View;
use Milk\Test;

class Index extends Controller
{

    public function index()
    {
        echo 'hello world';
    }

    public function hello($name)
    {
        echo 'hello' . $name;
    }


    public function getclass()
    {
        // app\middleware\CheckLogin
        Middleware::getProperties('middleware\Test');
    }
    public function view()
    {
        $html = 'Milk是一个免费开源的，快速、简单的面向对象的轻量级PHP开发框架';
        $arr = [
            'id' => 1,
            'name' => '张三'
        ];
        View::assign('info', $html);
        View::assign('arr', $arr);
        View::display();
    }
}
