
# Lista de Exercícios 01: Primeiros Passos com Laravel 🚀

**Objetivo:** Se familiarizar com o ambiente Laravel, aprender a instalar, configurar e executar um projeto, além de entender a estrutura básica do framework.

**Instruções:**
1. Crie uma pasta chamada `lista01` dentro do seu diretório de estudos Laravel.
2. Para cada exercício, crie um novo arquivo ou utilize os arquivos indicados do projeto Laravel.
3. Execute os comandos no terminal conforme solicitado.
4. Para ver o resultado, acesse `http://localhost:8000` após rodar o servidor com `php artisan serve`.

---


### Exercício 1: Instalação do Laravel
Instale o Composer em sua máquina. No terminal, execute:
`composer create-project laravel/laravel nome-do-projeto`
Escolha um nome para o projeto e aguarde a instalação. Verifique se a pasta foi criada corretamente.

### Exercício 2: Executando o Servidor
Navegue até a pasta do projeto e execute:
`php artisan serve`
Abra o navegador e acesse `http://localhost:8000` para ver a página inicial do Laravel. Se aparecer a tela padrão, está tudo certo!

### Exercício 3: Estrutura de Pastas
Abra o projeto no VS Code. Explore as pastas principais:
- `app`: código principal (models, controllers)
- `routes`: arquivos de rotas
- `resources`: views Blade, assets
- `public`: arquivos públicos (index.php, imagens, css)
Faça anotações sobre a função de cada pasta.

### Exercício 4: Rota Simples
No arquivo `routes/web.php`, adicione:
```php
Route::get('/ola', function() {
    return 'Olá, Laravel!';
});
```
Acesse `http://localhost:8000/ola` para testar.

### Exercício 5: View Blade
Crie o arquivo `resources/views/welcome.blade.php`. Na rota ou controller, retorne:
```php
return view('welcome', ['mensagem' => 'Bem-vindo ao Laravel!']);
```
No Blade, exiba a variável:
```blade
<h1>{{ $mensagem }}</h1>
```

### Exercício 6: Controller Básico
No terminal, execute:
`php artisan make:controller SaudacaoController`
No controller, crie um método:
```php
public function ola() {
    return view('welcome', ['mensagem' => 'Olá do Controller!']);
}
```

### Exercício 7: Rota para Controller
No `web.php`, adicione:
```php
Route::get('/controller-ola', [SaudacaoController::class, 'ola']);
```
Acesse `http://localhost:8000/controller-ola` para testar.

### Exercício 8: Configuração do .env
Abra `.env` e altere `APP_NAME=MeuAppLaravel`. Na view Blade, exiba:
```blade
<h2>{{ config('app.name') }}</h2>
```

### Exercício 9: Resumo do Ciclo de Requisição
Descreva: O usuário acessa uma rota → o Laravel identifica e executa o controller → o controller retorna uma view → a view é renderizada e enviada como resposta ao navegador.

---

**Dica:** O Laravel utiliza o padrão MVC (Model-View-Controller), facilitando a organização do código e a separação de responsabilidades. Explore a documentação oficial para aprofundar cada conceito: https://laravel.com/docs
