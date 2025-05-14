<?php

    class App {
        protected $controller = 'Home';
        protected $method = 'index';
        protected $params = [];

        public function __construct() {
            $url = $this->parseUrl();

            // Verificar si existe el controlador
            if(file_exists('app/controllers/' . ucwords($url[0]) . 'Controller.php')) {
                $this->controller = ucwords($url[0]);
                unset($url[0]);
            }

            // Incluir el controlador
            require_once 'app/controllers/' . $this->controller . 'Controller.php';
            $this->controller = $this->controller . 'Controller';
            $this->controller = new $this->controller;

            // Verificar si existe el método
            if(isset($url[1])) {
                if(method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }

            // Obtener parámetros
            $this->params = $url ? array_values($url) : [];

            // Llamar a la función del controlador con los parámetros
            call_user_func_array([$this->controller, $this->method], $this->params);
        }

        public function parseUrl() {
            if(isset($_GET['url'])) {
                return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            }
            return ['home', 'index'];
        }
    }

?>