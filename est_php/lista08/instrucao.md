# Lista de Exercícios 08: O Poder dos Bancos de Dados (MySQL com PDO) 🗄️

**Objetivo:** Aprender a conectar o PHP com um banco de dados MySQL, e a executar as quatro operações fundamentais (**CRUD**: Create, Read, Update, Delete) de forma segura usando Prepared Statements para prevenir SQL Injection.

## 🎓 **Fundamentos Teóricos - O que você precisa entender primeiro**

### **📊 Banco de Dados e MySQL**
- **Banco de Dados:** Sistema organizado para armazenar informações de forma estruturada
- **MySQL:** Sistema de gerenciamento de banco de dados relacional muito popular
- **Tabelas:** Estruturas que organizam dados em linhas (registros) e colunas (campos)
- **Chaves Primárias:** Identificadores únicos para cada registro (como um RG para pessoas)
- **Relacionamentos:** Como tabelas se conectam entre si para evitar duplicação de dados

### **🔌 PDO (PHP Data Objects)**
- **Interface Unificada:** PDO permite conectar com diferentes bancos (MySQL, PostgreSQL, SQLite)
- **Orientação a Objetos:** Utiliza classes e métodos para operações de banco
- **Portabilidade:** Código funciona com diferentes SGBDs mudando apenas a string de conexão
- **Recursos Avançados:** Transações, prepared statements, e tratamento robusto de erros

### **🛡️ Prepared Statements e Segurança**
- **SQL Injection:** Ataque onde código malicioso é inserido em consultas SQL
- **Placeholders:** Marcadores (como :nome) que são substituídos por valores seguros
- **Separação de Código e Dados:** SQL e dados são processados separadamente
- **Escape Automático:** PDO automaticamente "escapa" caracteres perigosos

### **🔄 CRUD - As 4 Operações Fundamentais**
- **Create (Criar):** INSERT - Adiciona novos registros ao banco
- **Read (Ler):** SELECT - Busca e recupera dados existentes
- **Update (Atualizar):** UPDATE - Modifica registros existentes
- **Delete (Deletar):** DELETE - Remove registros do banco

## 📋 **Manual de Instruções - Passo a Passo**

### **⚠️ Preparação Essencial (Faça antes de começar!)**

1. **Inicie o XAMPP:** Garanta que os módulos **Apache** e **MySQL** estejam rodando.
2. **Abra o phpMyAdmin:** No painel do XAMPP, clique em "Admin" na linha do MySQL.
3. **Crie o Banco de Dados:**
   * Na página do phpMyAdmin, clique em "Novo" no menu à esquerda.
   * Dê o nome ao banco de dados: `db_estudos_php`
   * Clique em "Criar".
4. **Crie a Tabela de Pacientes:**
   * Selecione o banco `db_estudos_php` que você acabou de criar.
   * Clique na aba "SQL".
   * Execute o comando SQL para criar a estrutura da tabela pacientes

---

## 🎯 **Exercício 1: A Conexão**

### **🎓 Conceitos que você vai aprender:**
- **DSN (Data Source Name):** String que identifica o servidor, banco e configurações
- **Tratamento de Exceções:** Como capturar e tratar erros de conexão
- **Configuração do PDO:** Parâmetros que controlam o comportamento da conexão
- **Charset UTF-8:** Codificação que suporta acentos e caracteres especiais

### **📝 O que fazer:**
1. **Crie o arquivo:** `conexao.php`
2. **Configure as variáveis** de conexão (host, banco, usuário, senha)
3. **Estabeleça a conexão** usando PDO com tratamento de erros
4. **Configure atributos** essenciais do PDO para segurança
5. **Teste a conexão** verificando se foi bem-sucedida

### **💡 Por que é importante:**
A conexão é a base de tudo. Sem ela, não conseguimos interagir com o banco. O tratamento correto de erros evita que informações sensíveis sejam expostas aos usuários.

---

## 🎯 **Exercício 2: Inserindo Dados (Create)**

### **🎓 Conceitos que você vai aprender:**
- **INSERT Statement:** Comando SQL para adicionar novos registros
- **Prepared Statements:** Técnica segura para executar comandos SQL
- **Placeholders:** Marcadores que são substituídos por valores reais
- **bindValue() vs bindParam():** Diferentes formas de associar valores
- **lastInsertId():** Como descobrir o ID do registro recém-criado

### **📝 O que fazer:**
1. **Inclua o arquivo de conexão**
2. **Defina o comando SQL** com placeholders para os valores
3. **Prepare a consulta** usando o método prepare()
4. **Associe os valores** aos placeholders de forma segura
5. **Execute a inserção** e verifique o sucesso

### **💡 Por que é importante:**
Inserir dados é uma operação fundamental. Os Prepared Statements protegem contra SQL Injection, um dos ataques mais comuns em aplicações web.

---

## 🎯 **Exercício 3: Formulário de Cadastro**

### **🎓 Conceitos que você vai aprender:**
- **Formulários HTML:** Como criar interfaces para entrada de dados
- **Métodos HTTP:** Diferença entre GET e POST
- **Validação Client-side:** Atributos HTML que validam dados
- **Integração PHP-HTML:** Como receber dados de formulários
- **$_POST e $_SERVER:** Superglobais para capturar dados

### **📝 O que fazer:**
1. **Crie um formulário HTML** com campos apropriados
2. **Configure validação básica** nos campos
3. **Modifique o script de inserção** para receber dados do formulário
4. **Implemente verificações** de método e dados recebidos
5. **Teste o fluxo completo** do cadastro

### **💡 Por que é importante:**
Formulários são a principal forma de os usuários interagirem com aplicações web. A validação adequada garante dados íntegros no banco.

---

## 🎯 **Exercício 4: Listando Todos os Pacientes (Read)**

### **🎓 Conceitos que você vai aprender:**
- **SELECT Statement:** Comando para buscar dados
- **fetchAll() vs fetch():** Métodos para recuperar resultados
- **PDO::FETCH_ASSOC:** Modo de busca que retorna arrays associativos
- **Loops foreach:** Como percorrer resultados de consultas
- **htmlspecialchars():** Proteção contra ataques XSS

### **📝 O que fazer:**
1. **Execute uma consulta SELECT** para buscar todos os pacientes
2. **Recupere os resultados** em formato de array associativo
3. **Crie uma tabela HTML** para exibir os dados
4. **Implemente um loop** para mostrar cada registro
5. **Aplique proteção XSS** nos dados exibidos

### **💡 Por que é importante:**
Listar dados é essencial para visualizar informações. A proteção XSS evita que scripts maliciosos sejam executados no navegador.

---

## 🎯 **Exercício 5: Buscando um Único Paciente**

### **🎓 Conceitos que você vai aprender:**
- **Cláusula WHERE:** Como filtrar registros específicos
- **Parâmetros GET:** Recebendo dados pela URL
- **fetch() para um registro:** Método para buscar apenas um resultado
- **PDO::PARAM_INT:** Especificação de tipos de dados
- **Verificação de existência:** Teste se um registro foi encontrado

### **📝 O que fazer:**
1. **Capture o ID** passado pela URL
2. **Execute consulta filtrada** usando WHERE
3. **Verifique se encontrou** o registro
4. **Exiba os dados** de forma organizada
5. **Trate casos** onde o registro não existe

### **💡 Por que é importante:**
Buscar registros específicos é fundamental para sistemas detalhados. A especificação de tipos melhora a performance e segurança.

---

## 🎯 **Exercício 6: Formulário de Edição (Parte 1)**

### **🎓 Conceitos que você vai aprender:**
- **Pré-preenchimento de formulários:** Como mostrar dados existentes
- **Campos hidden:** Campos ocultos para transportar informações
- **Reutilização de consultas:** Aproveitando código de busca
- **Escape de dados:** Proteção em campos de formulário
- **Fluxo de edição:** Preparação para atualização

### **📝 O que fazer:**
1. **Busque os dados** do paciente a ser editado
2. **Crie um formulário** com campos pré-preenchidos
3. **Inclua campo oculto** com o ID do registro
4. **Aplique escape adequado** nos valores dos campos
5. **Configure ação** para script de atualização

### **💡 Por que é importante:**
Edição de dados requer mostrar valores atuais ao usuário. Campos ocultos permitem manter informações necessárias entre requisições.

---

## 🎯 **Exercício 7: Atualizando Dados (Update)**

### **🎓 Conceitos que você vai aprender:**
- **UPDATE Statement:** Comando para modificar registros
- **Cláusula SET:** Como especificar quais campos alterar
- **rowCount():** Verificando quantos registros foram afetados
- **Validação de atualização:** Confirmando que a operação foi bem-sucedida
- **Controle de fluxo:** Diferentes respostas baseadas no resultado

### **📝 O que fazer:**
1. **Receba os dados** do formulário de edição
2. **Monte comando UPDATE** com todos os campos
3. **Execute a atualização** usando prepared statements
4. **Verifique o resultado** com rowCount()
5. **Forneça feedback** apropriado ao usuário

### **💡 Por que é importante:**
Atualizar dados mantém informações atualizadas. Verificar o número de linhas afetadas confirma que a operação foi executada.

---

## 🎯 **Exercício 8: Deletando Dados (Delete)**

### **🎓 Conceitos que você vai aprender:**
- **DELETE Statement:** Comando para remover registros
- **Segurança em exclusões:** Precauções antes de deletar
- **Busca prévia:** Verificando existência antes da exclusão
- **Feedback informativo:** Mostrando qual registro foi removido
- **Irreversibilidade:** Entendendo que DELETE é permanente

### **📝 O que fazer:**
1. **Capture o ID** do registro a ser excluído
2. **Busque informações** do registro antes de deletar
3. **Execute o DELETE** com WHERE específico
4. **Confirme a exclusão** verificando rowCount()
5. **Forneça feedback** informativo sobre a operação

### **💡 Por que é importante:**
Exclusão é uma operação crítica e irreversível. A verificação prévia e feedback adequado melhoram a experiência do usuário.

---

## 🎯 **Exercício 9: Contando Registros**

### **🎓 Conceitos que você vai aprender:**
- **Funções de agregação:** COUNT(), SUM(), AVG(), etc.
- **Consultas estatísticas:** Gerando relatórios simples
- **CURDATE() e DATE():** Funções de data do MySQL
- **ORDER BY e LIMIT:** Ordenação e limitação de resultados
- **Análise de dados:** Extraindo insights dos dados

### **📝 O que fazer:**
1. **Execute consulta COUNT()** para total de registros
2. **Implemente filtros por data** para estatísticas específicas
3. **Busque o último registro** cadastrado
4. **Organize as informações** de forma clara
5. **Crie relatório visual** das estatísticas

### **💡 Por que é importante:**
Relatórios e estatísticas ajudam a entender os dados. Funções de agregação são fundamentais para análises mais complexas.

---

## 🎯 **Exercício 10: Interface de Gerenciamento**

### **🎓 Conceitos que você vai aprender:**
- **CRUD completo:** Integrando todas as operações
- **Interface unificada:** Sistema de gerenciamento completo
- **Links dinâmicos:** URLs que incluem IDs de registros
- **JavaScript básico:** Confirmações antes de ações críticas
- **UX/UI:** Organizando funcionalidades de forma intuitiva

### **📝 O que fazer:**
1. **Modifique a listagem** para incluir botões de ação
2. **Adicione links dinâmicos** para cada operação
3. **Implemente confirmação** para exclusões
4. **Organize visualmente** com CSS
5. **Teste todas as funcionalidades** integradas

### **💡 Por que é importante:**
Um sistema CRUD completo é a base de muitas aplicações. A interface bem organizada melhora significativamente a usabilidade.

---

## 🛡️ **Fundamentos de Segurança - ESSENCIAL para Desenvolvimento Profissional**

### **🚨 SQL Injection - O Inimigo Número 1**
- **O que é:** Técnica onde código SQL malicioso é inserido em campos de entrada
- **Como acontece:** Quando dados do usuário são concatenados diretamente no SQL
- **Consequências:** Acesso não autorizado, vazamento ou destruição de dados
- **Prevenção:** SEMPRE use Prepared Statements com placeholders

### **🔒 XSS (Cross-Site Scripting)**
- **O que é:** Inserção de código JavaScript malicioso em páginas web
- **Como acontece:** Quando dados do usuário são exibidos sem sanitização
- **Consequências:** Roubo de cookies, redirecionamentos maliciosos, phishing
- **Prevenção:** Use htmlspecialchars() ao exibir dados do usuário

### **⚙️ Configuração Segura do PDO**
- **ATTR_ERRMODE:** Define como erros são tratados
- **ATTR_EMULATE_PREPARES:** Controla se prepared statements são emulados
- **ATTR_DEFAULT_FETCH_MODE:** Define modo padrão de busca
- **Charset UTF-8:** Evita problemas de codificação e alguns ataques

### **✅ Validação e Sanitização**
- **Validação:** Verificar se dados estão no formato correto
- **Sanitização:** Limpar dados removendo caracteres perigosos
- **Tipos de validação:** Email, data, números, tamanho de strings
- **Boas práticas:** Validar no cliente E no servidor

---

## 🎯 **Técnicas Avançadas que Você Vai Dominar**

### **🔄 Transações de Banco**
- **Atomicidade:** Todas as operações são executadas ou nenhuma é
- **Consistência:** Banco sempre fica em estado válido
- **Rollback:** Desfazer operações em caso de erro
- **Commit:** Confirmar todas as operações

### **📊 Relacionamentos entre Tabelas**
- **Chaves Estrangeiras:** Ligações entre tabelas
- **JOIN:** Consultas que combinam dados de múltiplas tabelas
- **Normalização:** Organizar dados para evitar redundância
- **Integridade Referencial:** Garantir consistência entre tabelas relacionadas

### **🚀 Otimização de Performance**
- **Índices:** Estruturas que aceleram consultas
- **LIMIT e OFFSET:** Paginação de resultados
- **Query Cache:** Cache de consultas frequentes
- **EXPLAIN:** Analisar como MySQL executa consultas

### **🔐 Controle de Acesso**
- **Autenticação:** Verificar identidade do usuário
- **Autorização:** Controlar o que cada usuário pode fazer
- **Sessões seguras:** Gerenciar login/logout
- **Criptografia de senhas:** Proteção de credenciais

---

## 🎓 **Resumo dos Conceitos Fundamentais**

### **💾 Banco de Dados**
- **Estrutura relacional:** Tabelas, linhas, colunas
- **CRUD:** Create, Read, Update, Delete
- **SQL:** Linguagem para consultar bancos
- **Integridade:** Dados sempre válidos e consistentes

### **🔌 PDO (PHP Data Objects)**
- **Abstração:** Interface única para diferentes bancos
- **Prepared Statements:** Consultas seguras e reutilizáveis
- **Tratamento de erros:** Exceções para problemas
- **Flexibilidade:** Configurações personalizáveis

### **🛡️ Segurança**
- **Prevenção de ataques:** SQL Injection, XSS
- **Validação robusta:** Dados sempre verificados
- **Escape de saída:** Proteção na exibição
- **Configurações seguras:** PDO configurado corretamente

### **💻 Integração Web**
- **Formulários HTML:** Interface de entrada
- **Métodos HTTP:** GET, POST para diferentes operações
- **Superglobais PHP:** $_GET, $_POST, $_SERVER
- **Fluxo completo:** HTML → PHP → Banco → Resposta

**🏆 Parabéns! Com estes conhecimentos você está preparado para desenvolver aplicações web seguras e profissionais!** 🎉

---

## 📚 **Próximos Passos na sua Jornada**

### **🎯 Tópicos para Aprofundar:**
1. **Framework MVC:** Laravel, CodeIgniter para organização profissional
2. **APIs RESTful:** Criação de serviços web
3. **JavaScript/AJAX:** Interações dinâmicas sem recarregar página
4. **Controle de versão:** Git para gerenciar código
5. **Deploy:** Publicar aplicações em servidores reais