# Lista de Exercícios 02: Lógica com Operadores e Condicionais 🤔

**Objetivo:** Aprender a controlar o fluxo do programa com base em condições, utilizando operadores de comparação e lógicos.

**Instruções:**
1.  Crie uma pasta chamada `lista02`.
2.  Para cada exercício, crie um novo arquivo PHP (ex: `exercicio1.php`).
3.  Acesse `http://localhost/estudos/lista02/exercicio1.php` no navegador para ver o resultado.

---

### Exercício 1: Maioridade
Crie uma variável `$idade` e atribua um valor a ela. Verifique se a idade é maior ou igual a 18. Se for, exiba "Maior de idade". Caso contrário, exiba "Menor de idade".

### Exercício 2: Par ou Ímpar
Crie uma variável `$numero`. Verifique se o número é par ou ímpar e exiba o resultado. (Dica: um número é par se o resto da sua divisão por 2 for igual a 0).

### Exercício 3: Comparação de Números
Crie duas variáveis, `$num1` e `$num2`. Compare-as e exiba uma das seguintes mensagens:
* "O primeiro número é maior."
* "O segundo número é maior."
* "Os números são iguais."

### Exercício 4: Verificação de Login
Crie duas variáveis, `$usuario_correto` e `$senha_correta`, com valores definidos por você. Crie outras duas variáveis, `$usuario_digitado` e `$senha_digitada`. Verifique se o usuário e a senha digitados são iguais aos corretos e exiba "Login efetuado com sucesso!" ou "Usuário ou senha inválidos.".

### Exercício 5: Situação do Aluno
Calcule a média de duas notas (`$nota1` e `$nota2`).
* Se a média for maior ou igual a 7, exiba "Aprovado".
* Se a média for maior ou igual a 5, mas menor que 7, exiba "Recuperação".
* Se a média for menor que 5, exiba "Reprovado".

### Exercício 6: Dia da Semana
Crie uma variável `$dia_semana` com um número de 1 a 7. Use a estrutura `switch` para exibir o nome do dia correspondente (1 para Domingo, 2 para Segunda, etc.). Se o número não for válido, exiba "Dia inválido.".

### Exercício 7: Faixa Etária
Crie uma variável `$idade_pessoa`. Use `if/elseif/else` para classificar a pessoa em uma das seguintes categorias e exibir a mensagem correspondente:
* 0-12 anos: "Criança"
* 13-17 anos: "Adolescente"
* 18-59 anos: "Adulto"
* 60 anos ou mais: "Idoso"

### Exercício 8: Operador Ternário
Crie uma variável `$saldo` com um valor numérico. Use o operador ternário para criar uma variável `$status` que terá o valor "Positivo" se o saldo for maior ou igual a zero, e "Negativo" caso contrário. Exiba o status.

### Exercício 9: Desconto por Categoria
Crie uma variável `$categoria` (ex: "eletronicos", "vestuario", "alimentos"). Use a estrutura `switch` para definir uma variável `$desconto`.
* Se a categoria for "eletronicos", o desconto é de 10%.
* Se for "vestuario", 15%.
* Se for "alimentos", 5%.
* Para qualquer outra categoria, o desconto é de 0%.
Exiba a porcentagem de desconto.

### Exercício 10: Verificação Múltipla
Crie três variáveis booleanas: `$tem_cartao_fidelidade`, `$fez_compra_grande` (se o valor da compra for maior que R$ 500) e `$e_cliente_antigo` (se a data de cadastro for anterior a um ano). O frete será grátis se **pelo menos duas** dessas condições forem verdadeiras. Crie uma lógica que verifique isso e exiba "Frete Grátis!" ou "Frete Normal.".

---

**Dica:** Preste atenção na diferença entre `==` (compara apenas o valor) e `===` (compara o valor E o tipo). Para a maioria das verificações de segurança, como senhas, `===` é mais recomendado.