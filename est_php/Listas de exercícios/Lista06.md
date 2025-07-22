# Lista de Exercícios 06: Interação com o Usuário (Formulários HTML) ⌨️

**Objetivo:** Aprender a criar formulários em HTML e a receber, validar e processar os dados enviados pelo usuário no lado do servidor com PHP, utilizando as superglobais `$_GET` e `$_POST`.

**Instruções:**
1.  Crie uma pasta chamada `lista06`.
2.  Para a maioria dos exercícios, você criará dois arquivos: um com o formulário HTML (ex: `form.html`) e outro com a lógica PHP que processa os dados (ex: `processa.php`).

---

### Exercício 1: Método `GET`
1.  Crie um arquivo `form_get.php` com um formulário HTML que peça o nome do usuário.
2.  O formulário deve usar o método `GET` e enviar os dados para um arquivo `saudacao_get.php`.
3.  No arquivo `saudacao_get.php`, recupere o nome usando `$_GET` e exiba a mensagem "Bem-vindo(a), [nome]!". Observe como o dado aparece na URL do navegador.

### Exercício 2: Método `POST`
1.  Faça o mesmo que no exercício anterior, mas agora em arquivos `form_post.php` e `saudacao_post.php`.
2.  Altere o método do formulário para `POST`.
3.  No `saudacao_post.php`, recupere o nome usando `$_POST`.
4.  Observe como, desta vez, o dado **não** aparece na URL.

### Exercício 3: Calculadora Simples
Crie um formulário que peça dois números. Crie um script PHP que receba esses dois números via `POST` e exiba os resultados da soma, subtração, multiplicação e divisão.

### Exercício 4: Verificador de Idade
Crie um formulário que peça o ano de nascimento do usuário. O script PHP deve calcular a idade da pessoa (use `date('Y')` para pegar o ano atual) e exibir se ela é "Menor de idade" ou "Maior de idade".

### Exercício 5: Validação de Campos
Crie um formulário de login com campos para "usuário" e "senha". No script PHP, antes de processar, verifique se os campos foram preenchidos.
* Use `isset()` para verificar se a variável existe.
* Use `!empty()` para verificar se não está vazia.
* Se algum campo estiver vazio, exiba a mensagem "Por favor, preencha todos os campos.". Caso contrário, exiba "Dados recebidos.".

### Exercício 6: Checkboxes
Crie um formulário de inscrição para um evento de saúde com checkboxes para áreas de interesse (ex: Nutrição, Cardiologia, Fisioterapia). O `name` dos checkboxes deve ser um array (ex: `name="interesses[]"`). No PHP, receba o array de interesses e exiba todos os que foram selecionados pelo usuário.

### Exercício 7: Radio Buttons
Em um formulário de agendamento, use botões de rádio (`<input type="radio">`) para que o usuário escolha o período da consulta: "Manhã", "Tarde" ou "Noite". No PHP, exiba o período que foi escolhido.

### Exercício 8: Select (Dropdown)
Crie um formulário de cadastro de paciente com um campo `<select>` para o tipo sanguíneo (A+, A-, B+, B-, AB+, AB-, O+, O-). O script PHP deve receber e exibir o tipo sanguíneo selecionado.

### Exercício 9: Segurança com `htmlspecialchars()`
Crie um formulário com um campo de `<textarea>` para o usuário deixar um comentário. No script PHP que recebe o dado, exiba o comentário da seguinte forma:
1.  Primeiro, usando um `echo` simples.
2.  Depois, usando `echo htmlspecialchars($comentario);`.
Teste enviando um código como `<h1>Teste</h1>` ou `<script>alert('oi');</script>` e veja a diferença crucial na saída.

### Exercício 10: Formulário em um Único Arquivo
Crie um único arquivo PHP que contenha o formulário e a lógica de processamento.
1.  No início do arquivo, verifique se a requisição é do tipo POST (`if ($_SERVER["REQUEST_METHOD"] == "POST")`).
2.  Se for, processe os dados do formulário e exiba uma mensagem.
3.  Se não for, apenas exiba o formulário HTML normalmente.
Isso é um padrão muito comum para evitar a criação de múltiplos arquivos para uma única funcionalidade.

---

**Dica de Segurança:** Nunca confie nos dados que vêm do usuário. A validação (exercício 5) e o tratamento da saída (exercício 9) são os primeiros passos fundamentais para criar aplicações seguras e evitar ataques como XSS (Cross-Site Scripting).

