<?php
    class User {
        private $db;
        
        public function __construct() {
            $this->db = new Database;
        }
        
        // Obtener todos los usuarios
        public function getUsers() {
            $this->db->query("SELECT * FROM users");
            return $this->db->resultSet();
        }
        
        // Obtener usuario por id
        public function getUserById($id) {
            $this->db->query("SELECT * FROM users WHERE id_user = :id");
            $this->db->bind(':id', $id);
            return $this->db->single();
        }
    }
?>