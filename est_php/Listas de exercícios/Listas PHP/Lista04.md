# Lista de Exercícios 04: Trabalhando com Coleções de Dados (Arrays) 🗂️

**Objetivo:** Aprender a criar, acessar e manipular os dois tipos principais de arrays em PHP (indexados e associativos) e a percorrer seus elementos de forma eficiente com o loop `foreach`.

**Instruções:**
1.  Crie uma pasta chamada `lista04`.
2.  Para cada exercício, crie um novo arquivo PHP.
3.  Use `print_r()` ou `var_dump()` para visualizar o conteúdo dos seus arrays durante o desenvolvimento.

---

### Exercício 1: Lista de Compras
Crie um array **indexado** (numérico) com uma lista de 5 itens de supermercado. Exiba o array completo na tela usando `print_r()`.

### Exercício 2: Acessando Itens
Do array criado no exercício anterior, exiba o primeiro item e o terceiro item da lista, cada um em uma linha.

### Exercício 3: Exibindo a Lista de Pacientes
Crie um array com 5 nomes de pacientes. Use um loop `foreach` para exibir cada nome em um item de lista HTML (`<li>`).

### Exercício 4: Dados do Paciente (Array Associativo)
Crie um array **associativo** para armazenar as informações de um paciente. Use as seguintes chaves: `nome`, `idade`, `email` e `cpf`. Preencha com dados fictícios.

### Exercício 5: Acessando Dados Associativos
Do array do exercício 4, exiba a seguinte frase: "O paciente [nome], portador do CPF [cpf], tem [idade] anos."

### Exercício 6: Chave e Valor
Use um loop `foreach` para percorrer o array do exercício 4 e exibir cada informação no formato: "Chave: Valor".
* Exemplo de saída:
    * nome: João da Silva
    * idade: 45
    * ...

### Exercício 7: Lista de Pacientes Completa (Multidimensional)
Crie um array que contenha 3 outros arrays. Cada um desses 3 arrays será um paciente (um array associativo como o do exercício 4). Esta é uma estrutura de dados muito comum.

### Exercício 8: Acessando Dados Multidimensionais
Do array criado no exercício 7, exiba o nome do segundo paciente e o email do terceiro paciente.

### Exercício 9: Adicionando e Removendo
1.  Crie um array com uma lista de medicamentos: `['Aspirina', 'Dipirona', 'Ibuprofeno']`.
2.  Adicione o medicamento "Paracetamol" ao **final** do array.
3.  Remova o **primeiro** medicamento do array.
4.  Exiba o array final.

### Exercício 10: Funções Úteis para Arrays
1.  Crie um array `$numeros` com os seguintes valores: `[10, 25, 8, 42, 15, 30]`.
2.  Use a função `count()` para exibir quantos elementos o array possui.
3.  Use a função `sort()` para ordenar o array em ordem crescente e exiba o resultado.
4.  Use a função `in_array()` para verificar se o número `42` existe no array e exiba uma mensagem apropriada ("Número encontrado!" ou "Número não encontrado.").

---

**Dica:** O loop `foreach` é seu melhor amigo para trabalhar com arrays, pois ele lida automaticamente com o tamanho do array e funciona perfeitamente tanto para arrays indexados quanto para associativos.
