# Lista de Exercícios 05: Organizando o Código com Funções 🧱

**Objetivo:** Aprender a criar blocos de código reutilizáveis (funções), passar informações para eles (parâmetros), receber resultados (retorno) e organizar seus projetos em múltiplos arquivos.

**Instruções:**

1.  Crie uma pasta chamada `lista05`.
2.  Siga as instruções de cada exercício, criando os arquivos necessários.

-----

### Exercício 1: Função de Boas-Vindas

Crie uma função chamada `saudacao` que não recebe nenhum parâmetro e simplesmente exibe a mensagem "Bem-vindo(a) ao nosso sistema\!". Chame esta função para ver o resultado.

### Exercício 2: Saudação Personalizada

Crie uma função `saudacaoUsuario` que receba um parâmetro `$nome`. A função deve exibir a mensagem "Olá, [nome]\! Seja bem-vindo(a)\!". Chame a função passando seu nome como argumento.

### Exercício 3: Função com Retorno

Crie uma função `calcularQuadrado` que receba um número como parâmetro e **retorne** o seu quadrado. Chame a função, armazene o resultado em uma variável e exiba essa variável.

### Exercício 4: Verificador de Par ou Ímpar

Crie uma função `ehPar` que receba um número e **retorne** `true` se o número for par e `false` se for ímpar. Fora da função, use um `if` para exibir "O número é par" ou "O número é ímpar" com base no retorno da função.

### Exercício 5: Calculadora de Média de Array

Crie uma função `calcularMedia` que receba um **array de notas** como parâmetro. A função deve calcular a média dessas notas e **retornar** o resultado. Teste a função com um array de notas. (Revisão da Lista 04\!)

### Exercício 6: Parâmetro com Valor Padrão

Crie uma função `montarMensagem` que receba dois parâmetros: `$nome_paciente` e `$assunto`, com `$assunto` tendo o valor padrão "Consulta de Rotina". A função deve retornar a string "Mensagem para [nome]: Seu agendamento de [assunto] foi confirmado.".

1.  Chame a função passando apenas o nome do paciente.
2.  Chame a função passando o nome e um assunto diferente (ex: "Exame de Sangue").

### Exercício 7: Escopo de Variáveis

1.  Fora de qualquer função, declare uma variável `$contador` com o valor 10.
2.  Crie uma função `incrementarContador` que tente somar 1 à variável `$contador` dentro dela.
3.  Chame a função e, depois, exiba o valor da variável `$contador` fora da função.
4.  Observe e entenda por que o valor da variável externa não foi alterado pela função.

### Exercício 8: Biblioteca de Funções (Arquivo Externo)

1.  Crie um arquivo chamado `funcoes_matematicas.php`.
2.  Mova a função `calcularQuadrado` (exercício 3) e `calcularMedia` (exercício 5) para dentro deste novo arquivo.
3.  Crie um segundo arquivo chamado `principal.php`.
4.  No `principal.php`, use `require 'funcoes_matematicas.php';` para incluir o arquivo.
5.  Chame as funções a partir do `principal.php` para testar se a inclusão funcionou.

### Exercício 9: Template Básico (Cabeçalho e Rodapé)

Crie um site simples de 3 arquivos:

1.  `cabecalho.php`: Deve conter o início do HTML (`<!DOCTYPE html>`, `<html>`, `<head>`, `<body>`).
2.  `rodape.php`: Deve conter o fechamento do HTML (`</body>`, `</html>`).
3.  `pagina_inicial.php`: Deve usar `include 'cabecalho.php';` no topo, exibir um conteúdo como "\<h1\>Página Principal\</h1\>", e usar `include 'rodape.php';` no final.

### Exercício 10: Funções com Tipos Declarados (Moderno)

Crie uma função `calcularIMC` que aceite dois parâmetros: `float $peso` e `float $altura`. A função também deve declarar que retornará um `float`. A fórmula do IMC é `peso / (altura * altura)`. Chame a função com seus dados e exiba o resultado.

```php
function calcularIMC(float $peso, float $altura): float {
    // seu código aqui
}
```

-----

**Dica:** Entender a diferença entre `include` e `require` é importante. Se o arquivo incluído com `require` não for encontrado, o script para com um erro fatal. Com `include`, ele apenas gera um aviso (warning) e o script continua. Para arquivos essenciais, como bibliotecas de funções, `require` é quase sempre a melhor escolha.
