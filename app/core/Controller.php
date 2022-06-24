<?php

    class Controller {
        

        protected function model($model)
        {
            // checks if the model exits
            if(file_exists('../app/models/' . $model . '.php'))
            {
                require_once '../app/models/' . $model . '.php';
                return new $model;
            }

        }

        public function view($view, $data = []) 
        {
            require_once '../app/views/' . $view . '.php';
        }
    }