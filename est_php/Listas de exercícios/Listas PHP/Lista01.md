# Lista de Exercícios 01: Primeiros Passos e Sintaxe Básica 🏁

**Objetivo:** Se familiarizar com o ambiente de desenvolvimento, aprender a criar variáveis, constantes, manipular tipos de dados básicos e exibir informações na tela.

**Instruções:**
1.  Crie uma pasta chamada `lista01` dentro do seu diretório de estudos.
2.  Para cada exercício, crie um novo arquivo PHP (ex: `exercicio1.php`).
3.  No XAMPP, inicie os módulos **Apache** e **MySQL**.
4.  Coloque sua pasta `lista01` dentro do diretório `htdocs` do XAMPP.
5.  Para ver o resultado, acesse `http://localhost/estudos/lista01/exercicio1.php` (ou o nome do arquivo correspondente) no seu navegador.

---

### Exercício 1: Olá, Mundo!
Crie um arquivo PHP que exiba a mensagem "Olá, Mundo!" na tela.

### Exercício 2: Informações Pessoais
Crie três variáveis: `$nome`, `$idade` e `$profissao`. Atribua seus dados a elas e exiba uma frase como: "Meu nome é [nome], tenho [idade] anos e sou [profissao]."

### Exercício 3: Operações Matemáticas
Crie duas variáveis com números inteiros. Calcule e exiba a **soma**, **subtração**, **multiplicação** e **divisão** desses números, com mensagens claras para cada resultado.

### Exercício 4: Tipos de Dados e `var_dump()`
Crie quatro variáveis com os seguintes tipos de dados: `String`, `Integer`, `Float/Double` e `Boolean`. Use a função `var_dump()` para exibir o valor e o tipo de cada uma delas.

### Exercício 5: Concatenação Criativa
Crie variáveis para um produto de saúde: `$nome_item` (ex: "Máscara N95"), `$preco` (ex: 12.50) e `$quantidade` (ex: 50). Crie uma única string usando concatenação que forme a frase: "Temos 50 unidades de Máscara N95 em estoque, cada uma custando R$ 12.50."

### Exercício 6: Calculadora de Média
Crie três variáveis para as notas de um aluno. Calcule a média aritmética dessas notas e exiba o resultado.

### Exercício 7: Trocando Valores
Crie duas variáveis, `$a` e `$b`, com valores diferentes (ex: `$a = 10;`, `$b = 25;`). Troque os valores entre elas utilizando uma terceira variável temporária (`$temp`). Ao final, exiba os novos valores de `$a` e `$b`.

### Exercício 8: Constantes
Declare uma constante chamada `CIDADE_NATAL` com o valor "Natal". Exiba uma frase que utilize esta constante, como por exemplo: "Eu moro na cidade de Natal.". (Dica: use a função `define()`).

### Exercício 9: Resto da Divisão (Módulo)
Crie uma variável `$total_pacientes` com um número inteiro (ex: 27). Crie outra variável `$profissionais_saude` com outro número (ex: 4). Calcule e exiba quantos pacientes sobram se forem divididos igualmente entre os profissionais. (Dica: use o operador de módulo `%`).

### Exercício 10: Conversão de Tipos
Crie uma variável `$temperatura_string` com o valor "29.5" (como string). Converta esta variável para o tipo `float` e some `1.2` a ela. Exiba o resultado final da soma.

---

**Dica:** A conversão de tipos (type casting) é uma ferramenta poderosa. Você pode forçar uma variável a ser de um tipo específico colocando o tipo entre parênteses na frente dela, como `(int)`, `(float)`, `(string)`.
