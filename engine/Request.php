<?php

namespace app\engine;


class Request
{

    protected $requestString;
    protected $controllerName;
    protected $actionName;
    protected $argument;
    protected $params;
    protected $method;



    public function __construct()
    {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->parseRequest();
    }

    private function parseRequest(){
        $this->method = $_SERVER['REQUEST_METHOD'];
        $url = explode('/', $this->requestString);
        $this->controllerName = $url[1];
        $this->actionName = $url[2];
        $this->argument = $url[3];
        $this->params = $_REQUEST;
        $data = json_decode(file_get_contents('php://input'));
        if (!is_null($data)){
            foreach ($data as $key => $value){
                $this->params[$key] = $value;
            }
        }
    }

    /**
     * @return mixed
     */
    public function getArgument()
    {
        return $this->argument;
    }

    /**
     * @return mixed
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     * @return mixed
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }



}