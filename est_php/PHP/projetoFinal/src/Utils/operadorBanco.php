<?php

namespace App\Utils;

class OperadorBanco {
    private $conn;

    public function __construct($host, $dbname, $user, $pass) {
        $this->conn = new \PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    }

    public function inserir($table, $data) {
        $fields = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));
        $stmt = $this->conn->prepare("INSERT INTO $table ($fields) VALUES ($placeholders)");
        return $stmt->execute(array_values($data));
    }

    public function atualizar($table, $data, $id) {
        $set = "";
        foreach ($data as $field => $value) {
            $set .= "$field = ?, ";
        }
        $set = rtrim($set, ", ");
        $stmt = $this->conn->prepare("UPDATE $table SET $set WHERE id = ?");
        return $stmt->execute(array_merge(array_values($data), [$id]));
    }

    public function deletar($table, $id) {
        $stmt = $this->conn->prepare("DELETE FROM $table WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function __destruct() {
        $this->conn = null;
    }
}