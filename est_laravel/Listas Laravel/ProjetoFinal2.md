# Projeto Final 2: SIGA-SAÚDE - Sistema Integrado de Gestão de Atendimentos 🚀

**Objetivo:** Desenvolver uma aplicação web multiusuário completa para a gestão de uma clínica de saúde, utilizando todo o poder do ecossistema Laravel. O sistema deverá ter diferentes níveis de permissão para diferentes tipos de profissionais, refletindo um cenário de negócio real.

---

### ✅ Funcionalidades Essenciais por Papel (Role)

O sistema terá três papéis de usuário: **Administrador**, **Recepcionista** e **Médico**.

#### **Como `Recepcionista` ou `Administrador`, eu quero poder:**
* Fazer login e logout do sistema.
* Gerenciar pacientes (CRUD completo: Cadastrar, Listar, Ver, Editar, Excluir).
* Gerenciar consultas (CRUD completo: Agendar, Listar, Ver, Editar, Excluir), associando um paciente e um médico a cada consulta.

#### **Como `Médico`, eu quero poder:**
* Fazer login e logout do sistema.
* Visualizar em um painel **apenas as minhas consultas** agendadas para o dia/semana.
* Acessar os detalhes do paciente de uma consulta específica.
* Adicionar notas ou observações a uma consulta após sua realização.

#### **Como `Administrador`, eu quero poder:**
* Ter todas as permissões de um Recepcionista.
* Gerenciar os usuários do sistema (CRUD completo: Cadastrar, Listar, Editar, Excluir), podendo definir o papel de cada um (Recepcionista, Médico, Admin).

---

### 🛠️ Requisitos Técnicos e Guia de Implementação

#### **Setup e Autenticação (Listas 11, 19)**
1.  **Instalação:** Inicie um novo projeto Laravel e instale o **Laravel Breeze** para ter o scaffolding de autenticação pronto.
2.  **Papéis (Roles):** Adicione uma coluna `tipo` (ex: `string`) à sua tabela `users` através de uma **migration**. Os valores podem ser `admin`, `medico`, `recepcionista`.

#### **Estrutura do Banco de Dados (Lista 15)**
Use **Migrations** para criar a seguinte estrutura:

* **`users`:** A tabela padrão do Laravel, com a adição da coluna `tipo` e talvez uma coluna `especialidade` (string, nullable) para os médicos.
* **`pacientes`:** Com colunas como `nome`, `cpf`, `data_nascimento`, `telefone`, `endereco`.
* **`consultas`:** Com colunas como `paciente_id` (chave estrangeira), `medico_id` (chave estrangeira para a tabela `users`), `data_consulta` (datetime), `status` (string), e `notas_consulta` (text, nullable).

#### **Models e Relacionamentos (Listas 16, 17)**
Defina os Models e seus relacionamentos:
* **`User`:**
    * Um usuário (médico) `hasMany` (tem muitas) `Consulta`.
* **`Paciente`:**
    * Um paciente `hasMany` (tem muitas) `Consulta`.
* **`Consulta`:**
    * Uma consulta `belongsTo` (pertence a) um `Paciente`.
    * Uma consulta `belongsTo` (pertence a) um `User` (o médico).

#### **Segurança e Permissões (Lista 19)**
* Crie um **Middleware** `ChecarPapel` que restrinja o acesso com base na coluna `tipo` do usuário.
* Use grupos de rotas em `routes/web.php` para aplicar os middlewares.
    * Ex: `Route::middleware(['auth', 'papel:admin'])->group(...)` para as rotas de gerenciamento de usuários.
    * Ex: `Route::middleware(['auth'])->group(...)` para as rotas gerais do sistema.

#### **Controllers e Rotas (Lista 14)**
* Utilize **Resource Controllers** para `UsuarioController`, `PacienteController` e `ConsultaController` para manter seu código organizado.
* A lógica para a visão do médico (listar apenas suas consultas) estará em um método específico, provavelmente no `ConsultaController` ou em um `MedicoDashboardController`.

#### **Views e Frontend (Lista 13)**
* Use um layout mestre com `@extends` e `@section`.
* Crie **Componentes Blade** para elementos reutilizáveis (ex: cartões de informação, botões, modais).
* Use as diretivas `@can` ou `@if(Auth::user()->tipo === 'admin')` para exibir ou esconder botões e links na interface de acordo com o papel do usuário logado.

#### **Formulários e Validação (Lista 18)**
* Crie **Form Requests** (ex: `StorePacienteRequest`) para encapsular as regras de validação de cada formulário.
* Use sempre `@csrf` em todos os formulários e o helper `old()` para uma melhor experiência do usuário.

---

### 🗺️ Passo a Passo Sugerido

1.  **Setup Inicial:** Instale o Laravel, o Breeze, crie o banco de dados e as migrations para todas as tabelas. Rode as migrations.
2.  **Autenticação e Papéis:** Implemente a coluna `tipo` na tabela `users`. Crie e registre o middleware de papéis. Cadastre manualmente 3 usuários no banco, um de cada tipo.
3.  **Módulo de Administração:** Comece pelo mais poderoso. Crie o CRUD de Usuários, protegido pela rota de `admin`.
4.  **Módulo de Pacientes:** Crie o CRUD de Pacientes, acessível por `admin` e `recepcionista`.
5.  **Módulo de Consultas:** Crie o CRUD de Consultas. O formulário de agendamento deve ter um `<select>` para escolher o paciente e outro para escolher o médico.
6.  **Painel do Médico:** Crie a rota e a lógica no controller para que, quando um médico faça login, ele veja uma lista apenas das suas próprias consultas.
7.  **Refinamento:** Adicione mensagens de sucesso após cada operação, melhore o layout, adicione validações e trate possíveis erros.

---
