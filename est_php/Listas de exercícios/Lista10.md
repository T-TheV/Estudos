# Lista de Exercícios 10: Tópicos Avançados e Boas Práticas ✨

**Objetivo:** Apresentar conceitos avançados de POO, o gerenciador de dependências Composer (essencial no PHP moderno), autoloading, namespaces e tratamento de exceções para criar código mais limpo, organizado e resiliente.

**Instruções:**

1.  Crie uma pasta chamada `lista10`.
2.  Para os exercícios que envolvem Composer, você precisará usar a linha de comando (terminal ou prompt de comando) na pasta do seu projeto.

-----

### Exercício 1: Propriedades e Métodos Estáticos (`static`)

Crie uma classe `Calculadora` com um método **estático** chamado `somar($a, $b)`. Chame este método diretamente pela classe, sem precisar criar um objeto: `Calculadora::somar(10, 25);`. Exiba o resultado. Isso é útil para funções que não dependem do estado de um objeto.

### Exercício 2: Classes Abstratas

1.  Crie uma `abstract class Funcionario` com uma propriedade `$nome` e um método `abstract public function calcularSalario();`.
2.  Crie duas classes, `FuncionarioCLT` e `FuncionarioPJ`, que **herdem** de `Funcionario`.
3.  Implemente o método `calcularSalario()` em cada uma delas com uma lógica diferente.
4.  Mostre que você não pode criar um `new Funcionario()`, mas pode criar `new FuncionarioCLT()`.

### Exercício 3: Interfaces

1.  Crie uma `interface Notificavel` com um método `enviarNotificacao($mensagem)`.
2.  Crie duas classes, `Email` e `SMS`, que **implementem** a interface `Notificavel`.
3.  Cada classe deve implementar o método `enviarNotificacao` à sua maneira (ex: "Enviando e-mail: [mensagem]").

### Exercício 4: Traits para Reutilização de Código

1.  Crie um `trait Log` com um método `registrarLog($mensagem)` que simplesmente exibe a mensagem de log.
2.  Crie duas classes não relacionadas, `Usuario` e `Venda`.
3.  Use a declaração `use Log;` dentro de ambas as classes.
4.  Instancie objetos das duas classes e chame o método `registrarLog()` a partir deles para mostrar que o código foi reutilizado.

### Exercício 5: Organizando com Namespaces

1.  Crie a seguinte estrutura de pastas: `src/Models/` e `src/Utils/`.
2.  Dentro de `src/Models/`, crie o arquivo `Paciente.php` com a `namespace App\Models;`.
3.  Dentro de `src/Utils/`, crie o arquivo `Validador.php` com a `namespace App\Utils;`.
4.  Em um arquivo `index.php` na raiz, use `use App\Models\Paciente;` e `use App\Utils\Validador;` para poder usar as classes com `new Paciente();` e `new Validador();`.

### Exercício 6: Iniciando um Projeto com Composer

Na pasta da `lista10`, abra seu terminal e execute o comando `composer init`. Pressione "Enter" para a maioria das perguntas para aceitar os padrões. Ao final, você terá um arquivo `composer.json`. Este é o início de um projeto PHP moderno.

### Exercício 7: Adicionando uma Dependência Externa

Ainda no terminal, execute `composer require fzaninotto/faker`. Faker é uma biblioteca popular para gerar dados falsos (nomes, endereços, etc.), útil para testes. Observe o `composer.json` e a nova pasta `vendor` que foi criada.

### Exercício 8: Autoloading com Composer

1.  Adicione a configuração de autoload PSR-4 ao seu `composer.json` para carregar as classes do exercício 5:
    ```json
    "autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    }
    ```
2.  No terminal, execute `composer dump-autoload`.
3.  Agora, no seu `index.php`, a única inclusão necessária é `require 'vendor/autoload.php';`. Após isso, você pode usar `new App\Models\Paciente()` e `new Faker\Factory()` sem precisar de `require` para cada arquivo.

### Exercício 9: Tratamento de Exceções (`try-catch`)

Crie uma função que aceite dois números e retorne a divisão. Dentro da função, se o segundo número for zero, **lance uma exceção**: `throw new Exception("Não é possível dividir por zero.");`. No código que chama a função, use um bloco `try-catch` para capturar a exceção e exibir a mensagem de erro de forma amigável.

### Exercício 10: Criando Exceções Customizadas

1.  Crie sua própria classe de exceção: `class CPFInvalidoException extends Exception {}`.
2.  Crie um método que valide um CPF. Se o CPF for inválido, lance a sua exceção customizada: `throw new CPFInvalidoException("O CPF informado não é válido.");`.
3.  Use um bloco `try-catch(CPFInvalidoException $e)` para capturar e tratar especificamente este tipo de erro.

-----

**Dica Final:** Os conceitos de **Namespaces** e **Autoloading com Composer** (exercícios 5 a 8) são, talvez, os mais importantes desta lista para o dia a dia. Eles eliminam a bagunça de `require` e `include` e são a base de como todo projeto profissional em PHP é estruturado.

