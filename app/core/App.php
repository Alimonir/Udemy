<?php declare(strict_types= 1);
class App
{
    //route geturl function,variable takes url explode to array
    protected $controller = '_404';
    protected $method = 'index';
    public static $pageName = "_404";
    public function __construct()
    {
        $arr = ($this->getUrl());
        $filename = ('../app/controllers/' . ucfirst($arr[0]) . '.php');
        if (file_exists($filename)) {
            require $filename;
            $this->controller = $arr[0];
            self::$pageName = $arr[0];
            unset($arr[0]);
        } else {
            require '../app/controllers/' . $this->controller . '.php';
        }
        $myController = new $this->controller;
        $myMethod = $arr[1] ?? $this->method;
        if (!empty($myMethod)) {
            if (method_exists($myController, strtolower($myMethod))) {
                $this->method = strtolower($myMethod);
                unset($arr[1]);
            }
        }

        $arr = array_values($arr);
        //print_r($arr); //to check what is in arr
        call_user_func_array([$myController, $this->method], $arr);
    }
    private function getUrl()
    {
        $url = $_GET['url'] ?? 'home';
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $arr = explode('/', $url);
        return $arr;
    }
}