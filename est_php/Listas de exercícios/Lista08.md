# Lista de Exercícios 08: O Poder dos Bancos de Dados (MySQL com PDO) 🗄️

**Objetivo:** Aprender a conectar o PHP com um banco de dados MySQL, e a executar as quatro operações fundamentais (**CRUD**: Create, Read, Update, Delete) de forma segura usando Prepared Statements para prevenir SQL Injection.

### **⚠️ Preparação Essencial (Faça antes de começar\!)**

1.  **Inicie o XAMPP:** Garanta que os módulos **Apache** e **MySQL** estejam rodando.
2.  **Abra o phpMyAdmin:** No painel do XAMPP, clique em "Admin" na linha do MySQL.
3.  **Crie o Banco de Dados:**
      * Na página do phpMyAdmin, clique em "Novo" no menu à esquerda.
      * Dê o nome ao banco de dados: `db_estudos_php`
      * Clique em "Criar".
4.  **Crie a Tabela de Pacientes:**
      * Selecione o banco `db_estudos_php` que você acabou de criar.
      * Clique na aba "SQL".
      * Copie e cole o código abaixo e clique em "Executar":
    <!-- end list -->
    ```sql
    CREATE TABLE pacientes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        data_nascimento DATE,
        data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    ```

-----

### Exercício 1: A Conexão

Crie um arquivo `conexao.php`. Nele, escreva o código para se conectar ao seu banco de dados `db_estudos_php` usando PDO. Use um bloco `try-catch` para capturar e exibir qualquer erro de conexão. Se a conexão for bem-sucedida, exiba "Conexão estabelecida com sucesso\!".

### Exercício 2: Inserindo Dados (Create)

Crie um script `inserir_paciente.php` que inclua seu arquivo `conexao.php`. Este script deve inserir um novo paciente na tabela. Use **Prepared Statements** para isso:

1.  Defina o SQL: `INSERT INTO pacientes (nome, email, data_nascimento) VALUES (:nome, :email, :data_nasc)`.
2.  Prepare a consulta com `$pdo->prepare()`.
3.  Associe os valores aos placeholders com `bindValue()` ou `bindParam()`.
4.  Execute com `$stmt->execute()`.
5.  Exiba uma mensagem de sucesso.

### Exercício 3: Formulário de Cadastro

Crie um formulário HTML (`form_cadastro.html`) que peça nome, email e data de nascimento. O formulário deve enviar os dados via `POST` para o script `inserir_paciente.php` do exercício anterior, que salvará os dados no banco.

### Exercício 4: Listando Todos os Pacientes (Read)

Crie um script `listar_pacientes.php` que busque **todos** os registros da tabela `pacientes`. Use `fetchAll(PDO::FETCH_ASSOC)` para obter os resultados e, em seguida, use um loop `foreach` para exibi-los em uma tabela HTML.

### Exercício 5: Buscando um Único Paciente

Crie um script `buscar_paciente.php` que busque um único paciente pelo seu `id`. Use uma cláusula `WHERE id = :id`, `prepare()`, `bindValue()` e `fetch(PDO::FETCH_ASSOC)` para obter o resultado. Exiba os dados do paciente encontrado.

### Exercício 6: Formulário de Edição (Parte 1)

Crie um script `form_editar.php` que recebe um `id` pela URL (ex: `form_editar.php?id=1`). O script deve:

1.  Buscar os dados do paciente com o `id` recebido (como no exercício 5).
2.  Exibir um formulário HTML com os campos já preenchidos com os dados atuais do paciente.

### Exercício 7: Atualizando Dados (Update)

Crie um script `atualizar_paciente.php` que receberá os dados do formulário do exercício 6 via `POST` (incluindo o `id`). O script deve usar um `UPDATE` com `WHERE id = :id` e Prepared Statements para atualizar os dados do paciente no banco.

### Exercício 8: Deletando Dados (Delete)

Crie um script `deletar_paciente.php` que recebe um `id` pela URL (ex: `deletar_paciente.php?id=2`). O script deve deletar o registro correspondente da tabela `pacientes` usando `DELETE` com `WHERE id = :id` e Prepared Statements. Exiba uma mensagem de sucesso.

### Exercício 9: Contando Registros

Crie um script que execute a consulta `SELECT COUNT(*) FROM pacientes;` para descobrir e exibir quantos pacientes estão cadastrados no total.

### Exercício 10: Interface de Gerenciamento

Junte tudo\! Na sua página `listar_pacientes.php` (exercício 4), modifique a tabela para que cada linha tenha duas novas colunas: "Ações".

  * Na primeira, coloque um link "Editar" que aponte para `form_editar.php?id=[id_do_paciente]`.
  * Na segunda, coloque um link "Excluir" que aponte para `deletar_paciente.php?id=[id_do_paciente]`.

-----

**Dica de Ouro:** **SEMPRE** use **Prepared Statements** (`prepare()` e `bindValue`/`bindParam()`) quando for inserir qualquer dado variável (vindo de formulários, URLs, etc.) em suas consultas. Essa é a principal defesa contra um dos ataques mais comuns na web: **SQL Injection**.

