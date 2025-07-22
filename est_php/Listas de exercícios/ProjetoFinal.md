
# Projeto Final: Sistema de Gestão de Pacientes e Agendamentos (UBS) 🏆

**Objetivo:** Desenvolver uma aplicação web funcional e segura para gerenciar pacientes e agendamentos de uma Unidade Básica de Saúde (UBS), aplicando todos os conceitos aprendidos: PHP procedural e orientado a objetos, interação com banco de dados MySQL via PDO, gerenciamento de sessões, e boas práticas de organização de código com Composer.

**Contexto:** Você é o desenvolvedor responsável por criar uma ferramenta interna para ajudar os profissionais de saúde da sua UBS a organizar melhor o atendimento, substituindo anotações em papel por um sistema digital simples e eficiente.

-----

### ✅ Funcionalidades Essenciais

1.  **Autenticação de Profissionais:**

      * Deve haver uma tela de login.
      * Apenas profissionais cadastrados e autenticados podem acessar o sistema.
      * Deve haver uma funcionalidade de "Logout".

2.  **Gerenciamento de Pacientes (CRUD Completo):**

      * **Cadastrar:** Formulário para adicionar novos pacientes (Nome, CPF, Data de Nascimento, Telefone).
      * **Listar:** Uma página que exibe todos os pacientes cadastrados em uma tabela.
      * **Editar:** Possibilidade de alterar as informações de um paciente existente.
      * **Excluir:** Possibilidade de remover um paciente do sistema.

3.  **Gerenciamento de Agendamentos:**

      * **Agendar:** Formulário para marcar uma nova consulta para um paciente já existente, em uma data e hora específicas.
      * **Listar:** Visualizar uma lista de todas as consultas agendadas (idealmente com filtros por dia).
      * **Atualizar Status:** Possibilidade de alterar o status de uma consulta (ex: de "Agendada" para "Realizada" ou "Cancelada").

-----

### 🛠️ Requisitos Técnicos e Estrutura

#### **Banco de Dados (Lista 08)**

Crie as seguintes tabelas no seu banco `db_estudos_php`:

  * **Tabela `profissionais`** (Para o Login)

    ```sql
    CREATE TABLE profissionais (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        senha VARCHAR(255) NOT NULL
    );
    -- Dica: Use password_hash() para salvar a senha!
    ```

  * **Tabela `pacientes`**

    ```sql
    CREATE TABLE pacientes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        cpf VARCHAR(14) NOT NULL UNIQUE,
        data_nascimento DATE NOT NULL,
        telefone VARCHAR(20)
    );
    ```

  * **Tabela `consultas`**

    ```sql
    CREATE TABLE consultas (
        id INT AUTO_INCREMENT PRIMARY KEY,
        id_paciente INT NOT NULL,
        data_consulta DATETIME NOT NULL,
        status VARCHAR(20) DEFAULT 'Agendada',
        FOREIGN KEY (id_paciente) REFERENCES pacientes(id) ON DELETE CASCADE
    );
    ```

#### **Arquitetura do Código (Listas 09 e 10)**

  * **Organização:** Use Composer para autoloading (PSR-4) e organize suas classes com Namespaces. Estrutura sugerida:
      * `public/`: Conterá o `index.php` (único ponto de entrada) e arquivos estáticos (CSS, JS).
      * `src/`: Conterá toda a sua lógica PHP (Models, Core, etc.).
      * `views/`: Conterá os templates HTML/PHP para cada página.
  * **POO:** Modele o sistema com classes: `Paciente`, `Consulta`, `Profissional`, `Database` (para a conexão PDO), etc.
  * **Segurança:** Use `htmlspecialchars()` para exibir dados e **Prepared Statements** para todas as consultas ao banco.

#### **Interface do Usuário (Listas 06 e 07)**

  * **Páginas/Telas:** Login, Dashboard, Lista de Pacientes, Formulário de Paciente (usado para criar e editar), Lista de Consultas, Formulário de Consulta.
  * **Sessões:** Use sessões (`$_SESSION`) para controlar o estado de login do profissional. Proteja as páginas restritas, redirecionando para o login caso o usuário não esteja autenticado.

-----

### 🗺️ Passo a Passo Sugerido (Para não se perder)

1.  **Passo 1: Fundação.** Crie a estrutura de pastas, configure o `composer.json` com autoload, crie o banco e as tabelas e estabeleça a classe de conexão com o banco.
2.  **Passo 2: Autenticação.** Crie a tabela `profissionais`. Construa a tela de login, a lógica de verificação de senha com `password_verify()`, o início da sessão e o logout. Esta é a porta de entrada do seu sistema.
3.  **Passo 3: CRUD de Pacientes.** Comece pelo "coração" dos dados. Implemente a funcionalidade completa para cadastrar, listar, editar e excluir pacientes.
4.  **Passo 4: CRUD de Consultas.** Agora, crie a funcionalidade para agendar consultas, vinculando-as a um paciente. Implemente a listagem e a atualização de status.
5.  **Passo 5: Refinamento.** Adicione mensagens de feedback para o usuário (ex: "Paciente cadastrado com sucesso\!"). Melhore a usabilidade e o visual com um CSS simples. Adicione validações mais robustas nos formulários.

### ⭐ Desafios Extras (Se quiser ir além)

  * Implementar uma busca por nome ou CPF na lista de pacientes.
  * Adicionar paginação à lista de pacientes se ela ficar muito longa.
  * Usar JavaScript para adicionar um calendário (Date Picker) no formulário de agendamento.
  * Criar um "Dashboard" inicial que mostre estatísticas simples, como "Total de Pacientes" e "Consultas Agendadas para Hoje".

