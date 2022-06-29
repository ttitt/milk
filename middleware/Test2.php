<?php

namespace middleware;


class Test2
{

    public $a;
    private $b;
    protected $c;

    public function beforeHandle()
    {
        echo '我是路由前置中间件';
    }

    public function afterHandle()
    {
        echo '我是路由后置中间件';
    }
}
