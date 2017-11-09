<?php

// Dispatch to corresponding route depending on request method GET or POST and hiddend POST field: method = 'PATCH' || method = 'DELETE'
Class Dispatch
{
    private $relativeURL = "";
    private $post = "";
    private $instances = 0;

    public function __construct ($relativeURL , $post )
    {
        $this->relativeURL = $relativeURL;
        $this->post = $post;
    }

    // get
    public function get ($url, $controllerName, $methodName)
    {
        if($this->isCurrentControl($url, $controllerName, $methodName) && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $controller = $this->createController($controllerName);
            $paramsCurrent = $this->getParams($this->relativeURL);
            $paramsAsked = $this->getParams($url);
            if(count($paramsCurrent) == 1) {
                $paramsCurrent = array_slice($paramsCurrent, 2);
            }

            if(count($paramsCurrent) == 2 && $paramsAsked[1] == 'id') {
                $paramsCurrent = array_slice($paramsCurrent, 1);
            }
            if(count($paramsCurrent) == 3 && $paramsAsked[1] == 'id') {
                $paramsCurrent = array_merge(array_slice($paramsCurrent, 1,1),array_slice($paramsCurrent, 3));
            }
            if($this->instances++ == 0) {
                call_user_func([$controller, $methodName], $paramsCurrent);
            }
        }
    }
    //post
    public function post ($url, $controllerName, $methodName)
    {
        if($this->isCurrentControl($url, $controllerName, $methodName) && $_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST['method'])) {
             $paramsCurrent = $this->getParams($this->relativeURL);
             $controller = $this->createController($controllerName);
            if($this->instances++ == 0) {
                call_user_func([$controller, $methodName], $this->post);
            }
        }
    }

    //patch
    public function patch ($url, $controllerName, $methodName)
    {
        if($this->isCurrentControl($url, $controllerName, $methodName) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['method']) && $_POST['method'] == 'PATCH') {
            $paramsCurrent = $this->getParams($this->relativeURL);
            $controller = $this->createController($controllerName);
            if($this->instances++ == 0) {
                call_user_func([$controller, $methodName],array_merge( [$paramsCurrent[1]] ,$this->post));
            }
        }
    }
    //delete
    public function delete ($url, $controllerName, $methodName)
    {
        if($this->isCurrentControl($url, $controllerName, $methodName) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['method']) && $_POST['method'] == 'DELETE') {
             $paramsCurrent = $this->getParams($this->relativeURL);
            $controller = $this->createController($controllerName);
            if($this->instances++ == 0) {
                call_user_func([$controller, $methodName],array_merge( [$paramsCurrent[1]] ,$this->post));
            }
        }
    }

    private function isCurrentControl ($url, $controllerName, $methodName)
    {
        $paramsAsked = $this->getParams($url);
        $paramsCurrent = $this->getParams($this->relativeURL);
        if(count($paramsAsked) != count($paramsCurrent)) {
            return false;
        }
        if($paramsAsked[0] != $paramsCurrent[0] ) {
            return false;
        }
        if(isset($paramsAsked[1]) && ($paramsAsked[1] != $paramsCurrent[1] && $paramsAsked[1] != "id")) {
            return false;
        }
        if(isset($paramsAsked[2]) && $paramsAsked[2] != $paramsCurrent[2]) {
            return false;
        }

        if(file_exists(APPDIR . "/controllers/" . ucwords($controllerName)) . ".php") {
            require_once APPDIR ."/controllers/" . ucwords($controllerName)  . ".php";
            $className = ucwords($controllerName);
            $temp = new $className;

            if(method_exists($temp, $methodName)) {
                return true;
            }
            unset($temp);
        } else {
            die('Controller ' . $controllerName . ' does not exists');
        }
        return false;
    }

    private function getParams($url)
    {
        $params = rtrim( $url, '/');
        $params = filter_var($params, FILTER_SANITIZE_URL);
        $params = explode('/', $params);
        return $params;
    }

    private function createController($controllerName)
    {
        $controllerName = ucwords($controllerName);
        require_once APPDIR ."/controllers/" . ucwords($controllerName)  . ".php";
        $controller = new $controllerName;
        return $controller;
    }
};
