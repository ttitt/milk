<?php

namespace app\index\middleware;


class Test3
{

    public $a;
    private $b;
    protected $c;

    public function beforeHandle()
    {
        echo '我是路由前置中间件INDEX';
    }

    public function afterHandle()
    {
        echo '我是路由后置中间件INDEX';
    }
}
