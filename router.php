<?php
    class Router{
        private $controller;
        private $method;

        public function __construct(){
            $this->matchRoute();
        }

        public function matchRoute(){
            //SEPARAR UNA CADENA DE TEXTO POR UN SEPARADOR
            $url = explode('/', URL);
            $this->controller = !empty($url[1]) ? $url[1] : 'Page';
            $this->method = !empty($url[2]) ? $url[2] : 'home';

            $this->controller = $this->controller . 'Controller';
            //INVOCAR AL CONTROLADOR DE FORMA DINAMICA
            include_once(__DIR__ . '/controllers/'.$this->controller.'.php');
        }

        public function run(){
            //CREAR UNA INSTANCIA DEL CONTROLADOR E INVOCAR EL METODO
            $controller = new $this->controller();
            $method = $this->method;
            $controller->$method();
        }
    }
?>