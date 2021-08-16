<?php
namespace MVC;
class Dispatcher
{

    private $request;

    public function dispatch()
    {
        $this->request = new Request();
        
        Router::parse($this->request->url, $this->request);
        
        $controller = $this->loadController();

        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        $name = 'MVC\\Controllers\\' . $this->request->controller . 'Controller';
        $file = __DIR__ . '/Controllers/'  .$this->request->controller. 'Controller.php';
//        var_dump($name);
        require($file);
//        $name = "MVC\Controllers\TasksController";
//var_dump($name);
        $controller = new $name;
        return $controller;
    }

}


?>