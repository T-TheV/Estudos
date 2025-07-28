<?php

class Usuario {
    private $nome;
    private $email;
    private $senha;

    public function __construct($nome, $email, $senha) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function verificarSenha($senha) {
        return password_verify($senha, $this->senha);
    }
    public function salvar() {
        $sql = "INSERT INTO profissionais (nome, email, senha) VALUES (:nome, :email, :senha)";
        echo "Usuário {$this->nome} salvo com sucesso!";
    }