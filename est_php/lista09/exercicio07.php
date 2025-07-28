<?php

class Medicamento {
    private $nome;
    private $laboratorio;
    private $preco;

    public function __construct($nome, $laboratorio, $preco) {
        $this->nome = $nome;
        $this->laboratorio = $laboratorio;
        $this->preco = $preco;
    }

    public function exibirInfo() {
        echo "Nome: " . $this->nome . "<br>";
        echo "Laboratório: " . $this->laboratorio . "<br>";
        echo "Preço: R$ " . number_format($this->preco, 2, ',', '.') . "<br><br>";
    }

    //  GETTERS CORRETOS - sem parâmetros, usando $this
    public function getNome() {
        return $this->nome;
    }

    public function getLaboratorio() {
        return $this->laboratorio;
    }

    public function getPreco() {
        return $this->preco;
    }

    //  SETTERS CORRETOS - sem echo desnecessário
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setLaboratorio($laboratorio) {
        $this->laboratorio = $laboratorio;
    }

    public function setPreco($preco) {
        if ($preco > 0) { // Validação básica
            $this->preco = $preco;
        } else {
            echo " Erro: Preço deve ser maior que zero!<br>";
        }
    }
}

//  TESTANDO OS MÉTODOS CORRETAMENTE
$medicamento1 = new Medicamento('Torsilax', 'Neo Química', 25.50);

echo "<h3>Informações iniciais:</h3>";
$medicamento1->exibirInfo();

echo "<h3>Usando Getters para acessar dados:</h3>";
echo "Nome obtido via getter: " . $medicamento1->getNome() . "<br>";
echo "Laboratório obtido via getter: " . $medicamento1->getLaboratorio() . "<br>";
echo "Preço obtido via getter: R$ " . number_format($medicamento1->getPreco(), 2, ',', '.') . "<br><br>";

echo "<h3>Usando Setters para modificar dados:</h3>";
$medicamento1->setNome('Dipirona');
$medicamento1->setLaboratorio('EMS');
$medicamento1->setPreco(12.90);

echo "Dados modificados com sucesso!<br><br>";

echo "<h3>Informações após modificação:</h3>";
$medicamento1->exibirInfo();

echo "<h3>Testando validação:</h3>";
$medicamento1->setPreco(-5); // Deve dar erro

?>
