<?php
class Paciente {
    private $nome;
    private $email;
    private $data_nascimento;
    private $cartao_sus;
    
    public function __construct($nome, $email, $data_nascimento, $cartao_sus = null) {
        $this->nome = $nome;
        $this->email = $email;
        $this->data_nascimento = $data_nascimento;
        $this->cartao_sus = $cartao_sus;
    }
    
    // Getters necessários para o CRUD
    public function getNome() {
        return $this->nome;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function getDataNascimento() {
        return $this->data_nascimento;
    }
    
    public function getCartaoSus() {
        return $this->cartao_sus;
    }
    
    // Setters
    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function setDataNascimento($data_nascimento) {
        $this->data_nascimento = $data_nascimento;
    }
    
    public function setCartaoSus($cartao_sus) {
        $this->cartao_sus = $cartao_sus;
    }
    
    public function exibirInfo() {
        echo "Nome: " . $this->nome . "<br>";
        echo "Email: " . $this->email . "<br>";
        echo "Data de Nascimento: " . $this->data_nascimento . "<br>";
        if ($this->cartao_sus) {
            echo "Cartão SUS: " . $this->cartao_sus . "<br>";
        }
    }
}
?>