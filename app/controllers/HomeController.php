<?php

    class HomeController extends Controller {
        private $userModel;
        
        public function __construct() {
            // Cargar modelo
            $this->userModel = $this->model('User');
        }
        
        public function index() {
            // Obtener usuarios
            $users = $this->userModel->getUsers();
            
            $data = [
                'title' => 'Página principal!!',
                'users' => $users
            ];

            // Cargar vista
            $this->view('home/index', $data);
        }
    }

?>