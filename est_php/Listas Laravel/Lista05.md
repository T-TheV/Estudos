
# Lista de Exercícios 05: Requests, Responses e Middlewares 🔄

**Objetivo:** Aprender sobre requisições, respostas e middlewares no Laravel, entendendo como interceptar e manipular dados entre o cliente e o servidor.

**Instruções:**
1. Crie uma pasta chamada `lista05` dentro do seu diretório de estudos Laravel.
2. Para cada exercício, utilize os arquivos indicados do projeto Laravel.
3. Execute os comandos no terminal conforme solicitado.
4. Teste as funcionalidades acessando `http://localhost:8000`.

---


### Exercício 1: Middleware Personalizado
No terminal, execute:
`php artisan make:middleware VerificaAcesso`
No método `handle`, adicione uma verificação (ex: horário de acesso, papel do usuário).

### Exercício 2: Aplicando Middleware em Rotas
No `web.php`, aplique:
```php
Route::get('/restrito', function() {...})->middleware('verifica.acesso');
```
Teste acessando a rota.

### Exercício 3: Modificando o Request
No middleware, adicione um campo ao request:
```php
$request->merge(['extra' => 'valor']);
```
No controller, acesse `$request->extra`.

### Exercício 4: Modificando a Response
No middleware, antes de retornar:
```php
$response = $next($request);
$response->header('X-Custom', 'Valor');
return $response;
```

### Exercício 5: Usando Request
No controller, acesse dados:
```php
$nome = $request->input('nome');
```
Teste com diferentes métodos (GET, POST).

### Exercício 6: Validação Avançada
No controller:
```php
$request->validate(['email' => 'required|email']);
```
Adicione regras customizadas se necessário.

### Exercício 7: Form Request
Crie:
`php artisan make:request CadastroRequest`
No arquivo gerado, defina regras em `rules()`. Use no controller:
```php
public function store(CadastroRequest $request) {...}
```

### Exercício 8: Testando o Ciclo Request/Response
Faça um fluxo completo: formulário → middleware → controller → resposta. Use logs para acompanhar o caminho dos dados.

### Exercício 9: Listando Middlewares
Execute:
`php artisan route:list --middleware`
Analise quais rotas usam quais middlewares.

### Exercício 10: Papel dos Middlewares
Explique: Middlewares interceptam requisições/respostas, permitindo validação, autenticação, manipulação de dados e segurança.

---

**Dica:** Middlewares são essenciais para segurança, validação e manipulação de dados em aplicações web. Consulte a documentação oficial para exemplos avançados: https://laravel.com/docs/middleware
