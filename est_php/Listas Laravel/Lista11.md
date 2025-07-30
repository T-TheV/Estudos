# Lista de Exercícios 11: Instalação e Ambiente Laravel 🚀

**Objetivo:** Preparar seu computador para o desenvolvimento com Laravel, instalar um novo projeto, entender a estrutura básica de pastas e rodar a aplicação pela primeira vez usando o Artisan.

### **⚠️ Pré-Requisitos Essenciais**

Antes de começar, o Laravel exige algumas ferramentas. Vamos garantir que você as tenha:

  * **PHP:** Versão 8.2 ou superior.
  * **Composer:** O gerenciador de pacotes para PHP.
  * **Terminal:** Qualquer interface de linha de comando (o terminal do VS Code, Git Bash, PowerShell, etc.).

-----

### Exercício 1: Verificação do Ambiente

Abra seu terminal e verifique se seu ambiente atende aos requisitos. Digite os seguintes comandos, um de cada vez:

```bash
php -v
composer --version
```

Confirme que a versão do PHP é 8.2 ou maior e que o Composer está instalado e respondendo.

### Exercício 2: Instalando o Laravel Installer

O Laravel Installer é uma ferramenta que facilita a criação de novos projetos. Para instalá-lo globalmente no seu computador, rode o seguinte comando no terminal:

```bash
composer global require laravel/installer
```

### Exercício 3: Criando seu Primeiro Projeto Laravel

Agora a parte divertida\! Navegue no seu terminal até a pasta onde você guarda seus projetos de estudo e use o installer para criar um novo projeto. Vamos chamá-lo de `siga-saude`:

```bash
laravel new siga-saude
```

Este comando vai baixar o Laravel e todas as suas dependências. Pode levar alguns minutos. Depois de concluído, entre na pasta do projeto:

```bash
cd siga-saude
```

### Exercício 4: Rodando o Servidor de Desenvolvimento

O Laravel vem com um servidor de desenvolvimento embutido, chamado Artisan. Para iniciar sua aplicação, execute:

```bash
php artisan serve
```

O terminal mostrará um endereço, geralmente `http://127.0.0.1:8000`. Copie e cole este endereço no seu navegador. Você deve ver a página de boas-vindas do Laravel\!

### Exercício 5: Explorando o Artisan

O Artisan é seu canivete suíço. Com o servidor rodando em um terminal, abra **outro terminal** na mesma pasta e explore os comandos disponíveis. Digite:

```bash
php artisan list
```

Veja a quantidade de tarefas que ele pode automatizar para você. Não se preocupe em entender tudo agora, apenas familiarize-se.

### Exercício 6: Entendendo a Estrutura de Pastas

Abra a pasta `siga-saude` no seu VS Code. Dê uma olhada na estrutura de arquivos e pastas. Tente identificar e entender o propósito destas 4 pastas/arquivos principais:

  * `app/`: Onde mora a lógica principal da sua aplicação (Models, Controllers, etc.).
  * `routes/`: Onde você define as URLs da sua aplicação (o arquivo `web.php` é o mais importante agora).
  * `resources/views/`: Onde ficam os arquivos HTML (com a "magia" do Blade).
  * `.env`: O arquivo de configuração do seu ambiente (banco de dados, nome da aplicação, etc.).

### Exercício 7: Configurando seu Ambiente (`.env`)

Abra o arquivo `.env`. Este arquivo guarda configurações sensíveis e específicas do seu ambiente. Encontre a linha `APP_NAME=Laravel` e mude para:

```
APP_NAME="SIGA-SAÚDE"
```

Salve o arquivo. **Importante:** Sempre que você altera o `.env`, é uma boa prática reiniciar o servidor Artisan para que as novas configurações sejam carregadas.

### Exercício 8: Sua Primeira Rota

Vamos fazer uma pequena modificação para ver o resultado.

1.  Abra o arquivo `routes/web.php`.
2.  Abaixo da rota que já existe, adicione estas linhas:
    ```php
    use Illuminate\Support\Facades\Route;

    Route::get('/ola-mundo', function () {
        return 'Meu primeiro teste de rota no Laravel!';
    });
    ```
3.  Com o servidor rodando, acesse no seu navegador: `http://127.0.0.1:8000/ola-mundo`. Você deve ver sua mensagem\!

### Exercício 9: Limpando o Cache

Às vezes, o Laravel guarda configurações antigas em cache para ser mais rápido. Se alguma mudança no `.env` parecer não ter efeito, use este comando para limpar o cache de configuração:

```bash
php artisan config:clear
```

É um bom comando para se ter na manga.

### Exercício 10: Iniciando o Controle de Versão

Boas práticas desde o início. Na pasta do seu projeto, inicie um repositório Git:

```bash
git init
git add .
git commit -m "Commit inicial do projeto SIGA-SAÚDE com Laravel"
```

O Laravel já vem com um arquivo `.gitignore` configurado, então arquivos sensíveis como o `.env` e a pasta `vendor` não serão enviados para o seu repositório.

-----

**Dica:** O arquivo `.env` **nunca** deve ser enviado para um repositório Git público. Ele contém senhas e chaves secretas. O arquivo `.env.example` é um exemplo que pode ser enviado, servindo como um guia para outros desenvolvedores configurarem seus próprios arquivos `.env`.

