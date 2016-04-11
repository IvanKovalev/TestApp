<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 04.04.2016
 * Time: 22:00
 */

namespace IvanKovalev\app\lib;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class DataBase
{
    private static $instance;

    private static $connectionParams = array(
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'ApiDataBase',
        'username'  => 'root',
        'password'  => '',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    );

    public static function getInstance()
    {


        if (null === static::$instance) {
            $capsule = new Capsule;

            $capsule->addConnection(self::$connectionParams);

            $capsule->setEventDispatcher(new Dispatcher(new Container));
            $capsule->setAsGlobal();

            $capsule->bootEloquent();
            static::$instance = $capsule;
        }

        return static::$instance;
    }


    protected function __construct()
    {

    }

    /**
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * @return void
     */
    private function __wakeup()
    {
    }
}