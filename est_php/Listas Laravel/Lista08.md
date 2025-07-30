
# Lista de Exercícios 08: API RESTful com Laravel 🌐

**Objetivo:** Aprender a criar APIs RESTful com Laravel, implementando rotas, controllers, autenticação e boas práticas de desenvolvimento de APIs.

**Instruções:**
1. Crie uma pasta chamada `lista08` dentro do seu diretório de estudos Laravel.
2. Para cada exercício, utilize os arquivos indicados do projeto Laravel.
3. Execute os comandos no terminal conforme solicitado.
4. Teste os endpoints usando Postman, Insomnia ou outro cliente HTTP.

---


### Exercício 1: Rotas API
No arquivo `routes/api.php`, crie:
```php
Route::apiResource('usuarios', UsuarioController::class);
```
Teste com métodos GET, POST, PUT, DELETE.

### Exercício 2: Controllers para API
Crie com:
`php artisan make:controller Api/UsuarioController --api`
Implemente métodos index, store, show, update, destroy.

### Exercício 3: Respostas JSON
Nos métodos do controller, retorne:
```php
return response()->json(['usuario' => $usuario]);
```

### Exercício 4: Autenticação via Token
Instale Sanctum:
`composer require laravel/sanctum`
Siga a documentação para proteger rotas e gerar tokens.

### Exercício 5: Testando Endpoints
Use Postman ou Insomnia para enviar requisições e analisar respostas. Teste autenticação, erros e sucesso.

### Exercício 6: Validação de Dados
No controller, valide:
```php
$request->validate(['email' => 'required|email']);
```
Retorne erros em JSON.

### Exercício 7: Filtros e Paginação
Implemente filtros usando query params e paginação com:
```php
Usuario::paginate(10);
```

### Exercício 8: Versionamento de API
Crie rotas como:
`Route::prefix('v1')->group(...)`
`Route::prefix('v2')->group(...)`
Mantenha compatibilidade entre versões.

### Exercício 9: Documentação da API
Use Swagger (OpenAPI) ou Laravel Scribe para gerar documentação automática dos endpoints.

### Exercício 10: Diferenças entre Rotas Web e API
Explique: Rotas web retornam views e usam sessão, rotas API retornam JSON e são stateless, ideais para integração com apps e serviços externos.

---

**Dica:** APIs bem estruturadas facilitam integrações e o desenvolvimento de aplicações modernas. Consulte a documentação oficial para exemplos avançados: https://laravel.com/docs/api-authentication
