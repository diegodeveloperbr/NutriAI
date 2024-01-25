<?php
class Usuario {
    private $conn;
    private $table = 'usuarios';

    public $id;
    public $nome_usuario;
    public $senha;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function login() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE nome_usuario = :nome_usuario AND senha = :senha';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome_usuario', $this->nome_usuario);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->execute();

        return $stmt;
    }
}
