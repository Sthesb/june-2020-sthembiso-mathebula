<?php

    class App 
    {

        protected $controller = 'Home';
        protected $method = 'index';
        protected $params = [];



        public function __construct()
        {
            $url = $this->parseURL();
            

            // checks of controller file exists
            if(isset($url) && file_exists('../app/controllers/'.$url[0].'.php')){
                $this->controller = $url[0];
                unset($url[0]);
            }

            require_once '../app/controllers/' . $this->controller .'.php';

            $this->controller = new $this->controller;

            // checks if method exits in the controller
            if(isset($url[1])){
                if(method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }

            // checks if are the items in $url and sets params to those items 
            $this->params = $url ? array_values($url) : [];

            call_user_func_array([$this->controller, $this->method], $this->params);

        }



        //get the url 
        public function parseURL()
        {
            if(isset($_GET['url'])){
                $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
                return $url;
            }
        }
    }