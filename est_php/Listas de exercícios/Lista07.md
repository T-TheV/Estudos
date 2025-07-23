# Lista de Exercícios 07: Guardando Informações (Sessões, Cookies e Arquivos) 💾

**Objetivo:** Aprender a manter o estado do usuário entre diferentes páginas usando sessões, a armazenar pequenas informações no navegador com cookies e a persistir dados em arquivos no servidor.

**Instruções:**
1.  Crie uma pasta chamada `lista07`.
2.  Para usar sessões, lembre-se de colocar `session_start();` no **topo** de todos os arquivos PHP que precisarem delas.

---

### Exercício 1: Login com Sessão (Página 1)
Crie uma página de login (`login.php`) com um formulário simples (usuário e senha). Quando o formulário for enviado, se o usuário for "admin" e a senha "1234", inicie uma sessão e armazene o nome de usuário nela (`$_SESSION['usuario'] = 'admin';`). Redirecione o usuário para uma "página restrita".

### Exercício 2: Página Restrita com Sessão (Página 2)
Crie a `pagina_restrita.php`. Este arquivo deve:
1. Iniciar a sessão.
2. Verificar se a variável `$_SESSION['usuario']` existe.
3. Se existir, exibir uma mensagem de boas-vindas: "Bem-vindo, [usuário]!".
4. Se não existir, redirecionar o usuário de volta para a página de login com uma mensagem de erro.

### Exercício 3: Logout (Página 3)
Crie uma página `logout.php`. Este arquivo deve iniciar a sessão, destruir todos os dados da sessão com `session_destroy()`, e redirecionar o usuário para a página de login com a mensagem "Você foi desconectado.".

### Exercício 4: Criando um Cookie de Preferência
Crie uma página que permita ao usuário escolher um "Modo de Visualização" (Claro ou Escuro) através de links. Ao clicar em um link, use `setcookie()` para salvar a preferência do usuário em um cookie chamado `modo_visualizacao` que dure 30 dias.

### Exercício 5: Lendo o Cookie
Na mesma página do exercício 4, adicione uma lógica que, ao carregar a página, verifique se o cookie `modo_visualizacao` existe. Se existir, exiba uma mensagem como: "Seu modo de visualização preferido é o [modo]".

### Exercício 6: Log de Acesso
Crie um script que, toda vez que for executado, adicione uma nova linha a um arquivo `log.txt`. A linha deve conter a data e a hora do acesso. (Dica: use `date('Y-m-d H:i:s')` e o modo de abertura de arquivo `'a'` para "append").

### Exercício 7: Exibindo o Log
Crie outro script que leia todo o conteúdo do arquivo `log.txt` e o exiba na tela do navegador. Para manter a formatação, exiba o conteúdo dentro de uma tag HTML `<pre>`.

### Exercício 8: Contador de Visitas
Crie um script que:
1. Leia um número de um arquivo `contador.txt`.
2. Incremente este número em 1.
3. Salve o novo número de volta no arquivo `contador.txt`, sobrescrevendo o valor antigo.
4. Exiba na tela a mensagem "Esta página foi visitada X vezes.".
*Se o arquivo não existir na primeira vez, considere o valor inicial como 0.*

### Exercício 9: Salvando Dados em JSON
Crie um formulário simples para cadastro de um medicamento (nome e laboratório). Ao enviar o formulário, crie um array associativo com os dados, converta-o para uma string JSON usando `json_encode()` e salve essa string no arquivo `medicamento.json`.

### Exercício 10: Lendo Dados de um JSON
Crie um script que leia o conteúdo do arquivo `medicamento.json`. Use `json_decode()` para converter a string JSON de volta para um objeto ou array PHP. Exiba os dados do medicamento de forma organizada na tela.

---

**Dica:** Entenda a diferença fundamental:
* **Sessões:** Armazenadas no **servidor**. O navegador recebe apenas um ID. Mais seguras, ideais para logins. Duram até o navegador ser fechado (por padrão).
* **Cookies:** Armazenados no **navegador do usuário**. Menos seguros, ideais para preferências e rastreamento. Podem ter uma longa data de expiração.

