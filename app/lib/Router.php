<?php
namespace IvanKovalev\app\lib;


class Router
{

    private static $routeList = array();


    public static function getRoute()
    {
        return self::$routeList;
    }

    public static function add($method, $url, $controller, $handler)
    {

        self::$routeList[$url] = [
            'method' => $method,
            'url' => $url,
            'controller' => 'IvanKovalev\app\controller\\'.$controller,
            'handler' => $handler
        ];

    }
    public static function watcher()
    {

        $parsedURL = self::parseUrl($_SESSION['url']);
        $route = router::getRoute()[$parsedURL['path']];
        if (isset($route) && !isset($parsedURL['query'])) {

            call_user_func(array(new $route['controller'](), $route['handler']));

        } elseIf (isset($route) && isset($parsedURL['query'])) {

            call_user_func_array(array(new $route['controller'](), $route['handler']), $parsedURL['query']);
        } else {

            echo '<br> unexpected URL! ->  ' . $parsedURL['path'];

        }
    }

    public static function restfulResource($url, $controller)
    {
        self::add('GET', $url, $controller, 'show');
        self::add('POST', $url . '/create', $controller, 'create');
        self::add('UPDATE', $url . '/edit', $controller, 'update');
        self::add('DELETE', $url . '/delete', $controller, 'destroy');

    }
    /**
     * @return array
     */
    private static function parseUrl($url)
    {
        $arr = parse_url($url);
        $result = array();
        if (isset($arr['query'])) {
            $params = explode('&', $arr['query']);

            foreach($params as $key=>$value){

                $param = explode('=', $value);
                $result[$param[0]] = $param[1];
            }
            $arr['query'] = $result;
            return $arr;
        } else {
            return $arr;
        }

    }


    private function __construct()
    {
    }


    private function __clone()
    {
    }


    private function __wakeup()
    {
    }

}