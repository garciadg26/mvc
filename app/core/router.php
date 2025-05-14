<?php
    class Router{
        protected $routes = [];

        public function __construct() {
            // Puedes cargar las rutas desde un archivo de configuración
            $this->routes = [
                '/' => ['controller' => 'HomeController', 'action' => 'index'],
                '/users' => ['controller' => 'UserController', 'action' => 'index'],
                // ... otras rutas
            ];
        }

        public function dispatch() {
            $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $url = rtrim($url, '/');
            
            if (array_key_exists($url, $this->routes)) {
                $controller = $this->routes[$url]['controller'];
                $action = $this->routes[$url]['action'];
                
                $controllerFile = __DIR__."/../controllers/{$controller}.php";
                
                if (file_exists($controllerFile)) {
                    require_once $controllerFile;
                    $controllerInstance = new $controller();
                    $controllerInstance->$action();
                } else {
                    throw new Exception("Controller file not found: {$controllerFile}");
                }
            } else {
                // Manejar error 404
                header("HTTP/1.0 404 Not Found");
                echo "Página no encontrada";
            }
        }
    }
?>