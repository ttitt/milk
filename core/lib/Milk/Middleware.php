<?php

/**
 * This file is part of Milk framework
 *
 * Author: ttitt <378797263@qq.com>
 * 
 * © Milk framework
 */

namespace Milk;

class Middleware
{
    /**
     * route register meddleware
     */
    public static function routeRegister($config, $func)
    {
        foreach ($config as $key => $value) {
            !self::filter($key) ?: self::run($value, $func);
        }
    }

    private static function handleRoute($arr)
    {
        if ($arr[array_key_last($arr)] == '*') {
            unset($arr[array_key_last($arr)]);
            return self::handleRoute($arr);
        } else {
            return $arr;
        }
    }

    public static function beforeHandle()
    {
        self::register(self::getConfig('all'), __FUNCTION__);
        self::routeRegister(self::getConfig('route'), __FUNCTION__);
    }

    public static function afterHandle()
    {
        self::register(self::getConfig('all'), __FUNCTION__);
        self::routeRegister(self::getConfig('route'), __FUNCTION__);
    }

    private static function getConfig($args)
    {
        return Config::get('middleware.' . $args);
    }

    /**
     * register meddleware
     */
    public static function register($config, $func)
    {
        $isRun = true;
        if (count($config) != 0) {
            foreach (self::getConfig('all_filter') as $key => $value) {
                !self::filter($value) ?: $isRun = false;
            }
            if ($isRun) {
                foreach ($config as $key => $value) {
                    self::run($value, $func);
                }
            }
        }
    }

    public static function filter($key)
    {
        $m = Request::getModule();
        $c = Request::getController();
        $a = Request::getAction();

        $route = self::handleRoute(explode('\\', $key));
        switch (count($route) <=> 2) {
            case 1:
                return $route === [$m, $c, $a] ? true : false;
                break;
            case 0:
                return $route === [$m, $c] ? true : false;
                break;
            case -1:
                return $route === [$m] ? true : false;
                break;
            default:
                break;
        }
    }

    public static function run($class, $func)
    {
        if (!method_exists($class, $func)) {
            throw new Exception("class {$class} has not " . $func . " method \r\n");
        }
        call_user_func([new $class, $func]);
    }
}
