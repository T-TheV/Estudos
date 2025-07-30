# Lista de Exercícios 09: Paradigma de Programação Orientada a Objetos (POO) 🏛️

**Objetivo:** Aprender os conceitos fundamentais da POO: classes, objetos, propriedades, métodos, encapsulamento (public/private), construtores e herança. O foco é aprender a modelar entidades do mundo real em seu código.

**Instruções:**
1.  Crie uma pasta chamada `lista09`.
2.  Para cada exercício, crie um novo arquivo PHP.

---

### Exercício 1: Sua Primeira Classe e Objeto
Crie uma classe chamada `Medicamento`. Por enquanto, deixe-a vazia. Em seguida, fora da classe, crie (instancie) dois objetos a partir dela: `$medicamento1 = new Medicamento();` e `$medicamento2 = new Medicamento();`. Use `var_dump()` para inspecionar os dois objetos.

### Exercício 2: Propriedades (Atributos)
Adicione três propriedades **públicas** à classe `Medicamento`: `$nome`, `$laboratorio` e `$preco`. Crie um objeto da classe, atribua valores a essas propriedades (ex: `$medicamento1->nome = 'Dipirona';`) e depois exiba esses valores na tela.

### Exercício 3: Métodos (Comportamentos) e `$this`
Adicione um método público chamado `exibirInfo()` à classe `Medicamento`. Este método deve usar `echo` para exibir uma frase com todas as propriedades do medicamento. Para acessar as propriedades de dentro do método, use a pseudo-variável `$this` (ex: `$this->nome`). Crie um objeto, atribua valores e chame o método `exibirInfo()`.

### Exercício 4: O Construtor (`__construct`)
Modifique a classe `Medicamento` para que os valores das propriedades sejam definidos no momento da criação do objeto. Adicione um método `__construct($nome, $laboratorio, $preco)`. Ele deve receber os dados como parâmetros e atribuí-los às propriedades da classe. Agora, para criar um objeto, você fará: `new Medicamento('Torsilax', 'Neo Química', 25.50);`.

### Exercício 5: Encapsulamento com `private`
Altere a visibilidade das propriedades da classe `Medicamento` de `public` para `private`. Tente acessar uma propriedade diretamente de fora da classe (ex: `$medicamento1->preco = 10;`). Você deverá ver um erro fatal. Isso demonstra a proteção dos dados.

### Exercício 6: Getters e Setters
Para permitir o acesso controlado às propriedades privadas, crie métodos "getters" e "setters".
* `public function getPreco() { ... }` // Deve retornar o preço
* `public function setPreco($novoPreco) { ... }` // Deve alterar o preço
Faça isso para todas as propriedades. Agora, use esses métodos para obter e alterar os dados de um objeto.

### Exercício 7: Validação no Setter
Melhore o método `setPreco($novoPreco)`. Adicione uma lógica que verifique se o `$novoPreco` é um número positivo. Se não for, o método não deve alterar o preço e pode exibir uma mensagem de erro. Isso mostra o poder dos setters para garantir a integridade dos dados.

### Exercício 8: Herança (`extends`)
1.  Crie uma classe base `Pessoa` com as propriedades `nome` e `cpf`.
2.  Crie uma classe `Paciente` que **herda** de `Pessoa` (`class Paciente extends Pessoa`). Adicione uma propriedade exclusiva para `Paciente`, como `$cartao_sus`.
3.  Crie um objeto `$paciente` e veja que você pode atribuir valores tanto para `$nome` e `$cpf` (herdadas) quanto para `$cartao_sus`.

### Exercício 9: Sobrescrevendo Métodos
1.  Na classe `Pessoa`, crie um método `exibirInfo()` que mostre o nome e o CPF.
2.  Na classe `Paciente`, crie **outro** método também chamado `exibirInfo()`.
3.  Este novo método deve primeiro chamar o método da classe pai (`parent::exibirInfo();`) para exibir o nome e o CPF, e depois deve exibir também o número do cartão SUS. Isso é chamado de sobrescrita de método.

### Exercício 10: Refatorando com POO
Pegue seu conhecimento da Lista 08. Crie uma classe chamada `PacienteCRUD` para gerenciar as operações no banco de dados.
1.  A classe deve ter uma propriedade privada `$pdo` para guardar a conexão.
2.  O construtor `__construct(PDO $conexao)` deve receber o objeto PDO.
3.  Crie métodos públicos como `listarTodos()`, `buscarPorId($id)`, `deletar($id)`.
4.  Crie um método `inserir(Paciente $paciente)`. Este método deve receber um **objeto** do tipo `Paciente` e usar os getters (`$paciente->getNome()`, etc.) para obter os dados a serem inseridos no banco.

---

**Dica:** Pense em uma **Classe** como uma planta de uma casa (o projeto) e um **Objeto** como uma casa real construída a partir dessa planta. Você pode construir várias casas (objetos) a partir da mesma planta (classe), e cada uma será independente da outra.
