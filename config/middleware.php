<?php

/**
 * This file is part of Milk framework
 *
 * Author: ttitt <378797263@qq.com>
 * 
 * © Milk framework
 */

return [
    // 注册全局中间件
    'all' => [
        'middleware\Test'
    ],
    // 全局中间件过滤（仅在开启全局中间件有效）
    'all_filter' => [
        'index\test\index2',
        // 'index\index\*',
        // 'index\*'
    ],
    // 注册路由中间件
    'route' => [
        // 'index\test\*' => 'middleware\Test2',
        // 'index\index\index' => 'middleware\Test3'
    ]
];
