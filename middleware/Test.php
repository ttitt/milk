<?php

namespace middleware;

use Milk\Request;

class Test
{

    public $a;
    private $b;
    protected $c;

    public function beforeHandle()
    {
        echo '我是前置中间件';
    }

    public function afterHandle()
    {
        echo '我是后置中间件';
    }
}
