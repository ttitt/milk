<?php

/**
 * This file is part of Milk framework
 *
 * Author: ttitt <378797263@qq.com>
 * 
 * © Milk framework
 */

register_shutdown_function(function () {
    if (error_get_last()['message'] == null)
        return;
    // echo '<pre>';
    // var_dump(error_get_last());
    extract(error_get_last());
    $file = substr($file, strrpos($file, '/') + 1);
    $html = "[{$type}] Error in $file line {$line} <br> <h2>{$message}</h2>";
    echo '<br>' . $html;
});

if (!function_exists('halt')) {
    function halt($var)
    {
        echo '<pre>';
        var_dump($var);
        exit();
    }
}
