# Lista de Exercícios 03: Estruturas de Repetição (Loops) 🔁

**Objetivo:** Aprender a executar blocos de código múltiplas vezes de forma controlada, utilizando as estruturas `for`, `while` e `do-while`.

**Instruções:**
1.  Crie uma pasta chamada `lista03`.
2.  Para cada exercício, crie um novo arquivo PHP.
3.  Acesse `http://localhost/estudos/lista03/nome_do_arquivo.php` no navegador para ver os resultados.

---

### Exercício 1: Contagem Crescente
Use um loop `for` para exibir os números de 1 a 10.

### Exercício 2: Contagem Regressiva
Use um loop `for` para exibir os números de 10 a 1.

### Exercício 3: Tabuada
Crie uma variável `$numero` com um valor (ex: 7). Use um loop `for` para exibir a tabuada de multiplicação desse número, de 1 a 10.
(Ex: "7 x 1 = 7", "7 x 2 = 14", ...)

### Exercício 4: Somente os Pares
Use um loop `while` para exibir todos os números pares de 1 a 20.

### Exercício 5: Sorteio
Use a função `rand(1, 6)` para simular o lançamento de um dado. Use um loop `do-while` para continuar jogando o dado até que o resultado seja 6. A cada jogada, exiba o número que saiu. No final, exiba "Finalmente, saiu um 6!".

### Exercício 6: Encontrando o "Tesouro"
Crie um loop `for` que conte de 1 a 100. Quando o loop chegar ao número 77, ele deve exibir a mensagem "Encontramos o tesouro!" e parar a execução imediatamente. (Dica: use o comando `break`).

### Exercício 7: Pulando os Múltiplos
Crie um loop `for` que vá de 1 a 50. Dentro do loop, use o comando `continue` para pular a exibição de qualquer número que seja múltiplo de 5.

### Exercício 8: Soma Total
Use um loop `while` para calcular a soma de todos os números de 1 a 100. Ao final, exiba o resultado total.

### Exercício 9: Fatorial
Crie uma variável `$numero` com um valor (ex: 5). Calcule o fatorial desse número e exiba o resultado. O fatorial de 5 (5!) é 5 * 4 * 3 * 2 * 1 = 120.

### Exercício 10: Simulação de Saldo
1.  Comece com uma variável `$saldo` com o valor 1000.
2.  Crie um loop `while` que continue executando enquanto o `$saldo` for maior que 0.
3.  Dentro do loop, simule uma compra de valor aleatório entre 50 e 150 reais usando `rand(50, 150)`.
4.  Subtraia o valor da compra do saldo.
5.  Exiba uma mensagem informando o valor da compra e o saldo restante.
6.  Quando o loop terminar (saldo ficar negativo ou zerado), exiba "Seu saldo acabou!".

---

**Dica:** Cuidado com os **loops infinitos**! Sempre garanta que a condição do seu loop (`while` ou `for`) em algum momento se tornará falsa, para que o programa não trave.
